<?php

namespace ProjectModule\Presenters;

use Functions\Functions;
use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\Json;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Factories\IssueFormFactory;
use ProjectModule\Services\TestPlanSprintCaseService;
use ProjectModule\Services\TestPlanSprintService;
use Ublaboo\DataGrid\DataGrid;

/**
 * Description of TestExecution
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestExecutionPresenter extends ManagementPresenter {
    
    /** @var Context @inject */
    public $database;
    
    /** @var TestPlanSprintService @inject */
    public $testPlanSprintService;
    
    /** @var TestPlanSprintCaseService @inject */
    public $testPlanSprintCaseService;

    /** @var  IssueFormFactory @inject */
    public $issueFormFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Test execution", ":Admin:Project:TestExecution:default", ["projectID" => $this->projectID]);

        if ($this->isAllowed(\Privilege::TEST_EXECUTION_SEE_ALL_PLANS_AND_SPRINTS)) {
            $testerTestPlans = $this->database->table("test_plan")
                ->select("id, name")
                ->where("project_id = ?", $this->projectID);
        } else {
            $testerTestPlans = $this->database->table("test_plan_sprint_case_user")
                ->select("test_plan_sprint_case.test_plan_sprint.test_plan.id AS id, 
                test_plan_sprint_case.test_plan_sprint.test_plan.name AS name")
                ->where("test_plan_sprint_case.test_plan_sprint.test_plan.project_id = ?", $this->projectID)
                ->where("user_id = ?", $this->user->getEntity()->getId())
                ->group("id");
        }

        $this->template->testerTestPlans = $testerTestPlans->fetchPairs("id", "name");
    }
    
    public function actionDefault($projectid) {}
    
    public function actionTestSprint($testSprintID = NULL) {
        
        $testSprint = $this->testPlanSprintService->getById($testSprintID);
        $testPlan = $testSprint->getTestPlan();

        $this->template->testSprint = $testSprint;
        $this->template->testPlan = $testPlan;

        if ($this->isAllowed(\Privilege::TEST_EXECUTION_SEE_ALL_PLANS_AND_SPRINTS)) {
            $testerTestSprints = $this->database->table("test_plan_sprint")
                ->select("test_plan_sprint.id AS test_plan_sprint_id, test_plan_sprint.name")
                ->where("test_plan_id = ?", $testPlan->getId())
                ->fetchPairs("test_plan_sprint_id", "name");
        } else {
            // we get all test sprints that current user can access?
            $testerTestSprints = $this->database->table("test_plan_sprint_case_user")
                ->select("test_plan_sprint_case.test_plan_sprint_id, test_plan_sprint_case.test_plan_sprint.name")
                ->where("user_id = ? AND test_plan_sprint_case.test_plan_sprint.test_plan_id = ?",
                    $this->user->getEntity()->getId(), $testPlan->getId())
                ->fetchPairs("test_plan_sprint_id", "name");
        }
        $this->template->testerTestSprints = $testerTestSprints;

        $this->template->priorities = DefaultValues::getPriorities();
        $this->template->statuses = DefaultValues::getStatuses();
        $this->template->jsonStatuses = Json::encode(DefaultValues::getStatuses());
        $this->template->forceStatusStatuses = [0 => "Automaticky"] + DefaultValues::getStatuses();
        $this->template->jsonForceStatusStatuses = Json::encode([0 => "Automaticky"] + DefaultValues::getStatuses());
    }
    
    // grid for testers
    public function createComponentTesterDatagrid($name) {
        
        /********************************************************************************
	 *                                  DATAGRID SETUP                              *
	 ********************************************************************************/
        $grid = new DataGrid($this, $name);
        $grid->setTranslator($this->translator);
        $grid->setTemplateFile($this->dirService->getBlocksDir().'/datagridTemplate.latte');
        $grid->setStrictSessionFilterValues(FALSE);
        $grid->setDefaultSort(["id" => "DESC"]);
        $grid->setDefaultPerPage(10);
        $grid->setColumnsHideable();
        
        $testPlanSprintID = $this->getParameter("testSprintID");
        $testCasesWithTestSteps = $this->database->table("test_plan_sprint_case")
            ->select("test_plan_sprint_case.id, count(test_plan_case.test_case:test_step.id) AS countTestSteps")
            ->where("test_plan_sprint_id = ?", $testPlanSprintID)
            ->group("id")
            ->fetchPairs("id", "countTestSteps");
        $countOfTestedTestSteps = $this->database->query("SELECT id, count(countTestSteps) AS countTestSteps from ( 
                SELECT `test_plan_sprint_case`.`id`, count(`test_step_execution`.`id`) AS `countTestSteps` 
                FROM `test_step_execution` 
                LEFT JOIN `test_plan_sprint_case` ON `test_step_execution`.`test_plan_sprint_case_id` =
                `test_plan_sprint_case`.`id` 
                WHERE (`test_plan_sprint_case`.`test_plan_sprint_id` = ?) 
                GROUP BY `test_step_id`
                ) as tab
            group by id", $testPlanSprintID)
            ->fetchPairs("id", "countTestSteps");
        /********************************************************************************
	 *                                  BASIC DATA                                 *
	 ********************************************************************************/
        $data = $this->database->table("test_plan_sprint_case")
            ->select("test_plan_sprint_case.id,
            test_plan_sprint.test_plan.name AS testPlanID,
            test_plan_sprint.name AS testPlanSprintID,
            test_plan_case.test_case.name AS testCaseName,
            test_plan_case.test_case.test_set.name AS testSetName,
            forced_status_id AS forcedStatusID,
            test_plan_case.test_case.priority AS priority,
            status_id")
            ->where("test_plan_sprint_case.test_plan_sprint_id = ?", $testPlanSprintID);
        if (!$this->isAllowed(\Privilege::TEST_EXECUTION_SEE_ALL_PLANS_AND_SPRINTS)) {
            $data->where(":test_plan_sprint_case_user.user_id = ?", $this->user->getEntity()->getId());
        }
        $grid->setDataSource($data);

        $grid->addColumnText("id", "ID")
            ->setSortable();

        $grid->addColumnText("testSetName", "Test Set")
            ->setSortable();
        $grid->addColumnText("testCaseName", "Test case")
            ->setSortable();
        $grid->addColumnText("user", "Tester")
            ->setRenderer(function(ActiveRow $item) {
                $columns = $item->getTable()->select(":test_plan_sprint_case_user.user.id AS userID,
                 CONCAT(:test_plan_sprint_case_user.user.name, ' ',:test_plan_sprint_case_user.user.surname) AS testerName")
                    ->order("userID ASC")
                    ->fetchPairs("userID", "testerName");
                unset($columns[""]);
                $testers = join(", ", $columns);

                return $testers;
            })
            ->setDefaultHide(TRUE);
        /********************************************************************************
	 *                           ADDITIONAL INFORMATION                              *
	 ********************************************************************************/
        $grid->addColumnText("countOfTestSteps", "Počet TS")
            ->setRenderer(function($item) use($testCasesWithTestSteps) {

                $countOfTestSteps = $testCasesWithTestSteps[$item["id"]];

                return $countOfTestSteps;
            })
            ->setAlign("center");
        $grid->addColumnText("countOfDoneTestSteps", "Otestovaných TS")
            ->setRenderer(function($item) use($countOfTestedTestSteps, $testCasesWithTestSteps) {

                if (array_key_exists($item["id"], $countOfTestedTestSteps)) {
                    $percentage = round($countOfTestedTestSteps[$item["id"]] / $testCasesWithTestSteps[$item["id"]] * 100, 2);
                    return $countOfTestedTestSteps[$item["id"]] . " - " . $percentage . "%";
                }

                return 0;
            })
            ->setAlign("center");
        $grid->addColumnText("status_id", "Status")
            ->setRenderer(function($item) {

                if (!is_null($item["forcedStatusID"])) {
                    return "<span class='nowrap'>" . DefaultValues::getStatuses()[$item["forcedStatusID"]] . "</span>";
                }
                return "<span class='nowrap'>" . DefaultValues::getStatuses()[$item["status_id"]] . "</span>";
            })
            ->setAlign("center")
            ->setSortable()
            ->setTemplateEscaping(FALSE);
        $grid->addColumnText("priority", "Priorita")
            ->setRenderer(function(ActiveRow $item) {
                $priority = $item->getTable()->select("test_plan_case.test_case.priority")->fetchField("priority");

                return DefaultValues::getPriorities()[$priority];
            });
        
        /********************************************************************************
	 *                              ROW CALLBACK                                    *
	 ********************************************************************************/
        $grid->setRowCallback(function($item, $tr) {

            $statusID = $item["status_id"];
            if (!is_null($item["forcedStatusID"])) {
                $statusID = $item["forcedStatusID"];
            }

            $class = DefaultValues::getLabelByStatusID($statusID);

            $tr->addClass($class);
        });

        /********************************************************************************
         *                              FILTERS                                         *
         ********************************************************************************/
        $grid->setOuterFilterRendering(TRUE);

        $filters = $this->getPreparedFilters($testPlanSprintID);
        $grid->addFilterSelect("testSet", "Test Set", $filters["testSets"])
            ->setCondition(function(Selection $fluent, $value) {
                return $fluent->where("test_plan_case.test_case.test_set_id = ?", $value);
            });
        $grid->addFilterSelect("testCase", "Test Case", $filters["testCases"])
            ->setCondition(function(Selection $fluent, $value) {
                return $fluent->where("test_plan_case.test_case_id = ?", $value);
            });
        $grid->addFilterSelect("priority", "Priorita", $filters["priorities"])
            ->setCondition(function(Selection $fluent, $value) {
                return $fluent->where("test_plan_case.test_case.priority = ?", $value);
            });
        $grid->addFilterSelect("statuses", "Status", $filters["statuses"])
            ->setCondition(function(Selection $fluent, $value) {
                return $fluent->where("status_id = ?", $value);
            });


            
        /********************************************************************************
	 *                                ACTION BLOCK                                  *
	 ********************************************************************************/
        $vars = [
            "runningTestPlanSprintCases" => $this->getRunningTestPlanSprintCases($this->user->getId(), $testPlanSprintID)
        ];
        $grid->addColumnText("action", "Akcie")
            ->setTemplate(__DIR__ . "/../templates/TestExecution/Blocks/action.latte", $vars);
        
        return $grid;
    }
    
    private function getRunningTestPlanSprintCases($userID, $testSprintID) {

        $return = $this->database->table("test_case_run")
            ->select("test_plan_sprint_case.id AS id")
            ->where("(endtime IS NULL) AND (creator_id = ?) AND (test_plan_sprint_case.test_plan_sprint_id = ?)", $userID, $testSprintID)
            ->fetchPairs("id", "id");
        
        return $return;
    }
    
    private function getPreparedFilters($testPlanSprintID) {

        $filters = [
            "testSets" => [],
            "testCases" => [],
            "statuses" => [],
            "priorities" => []
        ];
        /**
         * Filters for Test Sets
         */
        $filters["testSets"] = [NULL => "-"] + $this->database->table("test_set")
            ->select("test_set.id, test_set.name")
            ->where(":test_case:test_plan_case:test_plan_sprint_case:test_plan_sprint_case_user.user_id = ?
                AND :test_case:test_plan_case:test_plan_sprint_case.test_plan_sprint_id = ?",
                $this->user->getEntity()->getId(), $testPlanSprintID)
            ->fetchPairs("id", "name");

        /**
         * Filters for Test Cases
         */
        $filters["testCases"] = [NULL => "-"] + $this->database->table("test_case")
                ->select("test_case.id, test_case.name")
                ->where(":test_plan_case:test_plan_sprint_case:test_plan_sprint_case_user.user_id = ? 
                AND :test_plan_case:test_plan_sprint_case.test_plan_sprint_id = ?",
                $this->user->getEntity()->getId(), $testPlanSprintID)
                ->fetchPairs("id", "name");

        /**
         * Filters for Statuses
         */
        $filters["statuses"] = [NULL => "-"] + DefaultValues::getStatuses();

        /**
         * Filters for Priorities
         */
        $filters["priorities"] = [NULL => "-"] + DefaultValues::getPriorities();

        return $filters;
    }
    
    public function handleRedrawDatagrid() {
        $this["testerDatagrid"]->redrawControl('items');
        $this["testerDatagrid"]->redrawControl('tbody');
    }
    
    public function handleOpenTestPlanSprintCase($testPlanSprintCaseID) {
        
        $this->template->testPlanCaseTemplate = TRUE;
        
        $testPlanSprintCase = $this->testPlanSprintCaseService->getById($testPlanSprintCaseID);
        $testPlanSprint = $testPlanSprintCase->getTestPlanSprint();
        $testPlan = $testPlanSprint->getTestPlan();
        $testCase = $testPlanSprintCase->getTestPlanCase()->getTestCase();
        $testSet = $testCase->getTestSet();
        $this->template->testPlanSprintCase = $testPlanSprintCase;
        $this->template->testPlanSprint = $testPlanSprint;
        $this->template->testPlan = $testPlan;
        $this->template->testCase = $testCase;
        $this->template->testSet = $testSet;
        
        $this->redrawControl("testPlanCase");
    }

    public function createComponentAddIssueForm() {

        $form = $this->issueFormFactory->createAddForm();
        $form->onSuccess[] = function() {
            $this->payload->success = 1;
            $this->sendPayload();
        };
        $form->onError[] = function() {
            $this->payload->success = 0;
            $this->sendPayload();
        };
        return $form;
    }
    
}
