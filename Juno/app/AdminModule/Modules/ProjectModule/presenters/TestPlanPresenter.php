<?php

namespace ProjectModule\Presenters;

use DefaultModule\Services\SimpleEntityService;
use Functions\Functions;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use Nette\Application\UI\Form;
use Nette\Application\UI\Multiplier;
use Nette\Database\Context;
use ProjectModule\Entities\TestPlan;
use ProjectModule\Entities\TestPlanSprint;
use ProjectModule\Factories\TagDatesFormFactory;
use ProjectModule\Factories\TestPlanFormFactory;
use ProjectModule\Factories\TestPlanSprintFormFactory;
use ProjectModule\Factories\TestPlanSprintRoleFormFactory;
use ProjectModule\Services\ProjectRoleService;
use ProjectModule\Services\TestPlanService;
use ProjectModule\Services\TestPlanSprintService;

/**
 * Description of TestPlanPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanPresenter extends ManagementPresenter {
    
    /** @var TestPlanService @inject */
    public $testPlanService;
    
    /** @var TestPlanFormFactory @inject */
    public $testPlanFormFactory;
    
    /** @var TestPlanSprintFormFactory @inject */
    public $testPlanSprintFormFactory;
    
    /** @var ProjectRoleService @inject */
    public $projectRoleService;
    
    /** @var TestPlanSprintRoleFormFactory @inject */
    public $testPlanSprintRoleFormFactory;
    
    /** @var SimpleEntityService @inject */
    public $simpleEntityService;

    /** @var  TestPlanSprintService @inject */
    public $testPlanSprintService;

    /** @var  TagDatesFormFactory @inject */
    public $tagDatesFormFactory;
    
    /** @var Context @inject */
    public $database;
    
    public function startup() {
        parent::startup();        
        $this->addBreadCrumb("Test plan", ":Admin:Project:TestPlan:default", ["projectID" => $this->projectID]);
    }
    
     public function createComponentTestPlanGrid($name) {
        
        $qb = $this->testPlanService->getAllAsQb()
                ->where("tp.project = :project")
                ->setParameter("project", $this->project);
        $grid = $this->datagridFactory->createDatagrid($this, $qb, $name);
        $grid->setHeader("Test Plan / Test Plan Sprint");
        
        $grid->setHugeTreeView([$this, "getChildren"], [$this, "hasChildren"]);
        
        $grid->addColumnText("name", "Názov")
            ->setRenderer(function($item) {
                return $item->getTrProp("name");
            })
            ->setSortable();
        $grid->addColumnText("user", "Vytvoril")
            ->setRenderer(function($item) {
                return $item->getCreator()->getFullName();
            });
        $grid->addColumnDateTime("createDate", "Dátum vytvorenia")
            ->setSortable();
        
        $grid->addFilterText("name", "Názov TP");
        $grid->addFilterDateRange("createDate", "Dátum vytvorenia TP");
        $grid->addFilterSelect("creator", "Vytvoril TP", Functions::insertEmptyArray($this->userService->getAllUsersInProject($this->projectID)));
        
        $this->datagridFactory->addAction($grid, "ProjectPresenter", "ProjectModule/templates/TestPlan");
        
        return $grid;
    }
    
    public function getChildren($id) {
        return $this->testPlanService->getById($id)->getTestPlanSprints();
    }
    
    public function hasChildren($item) {
        return $item->hasChildren();
    }
    
    public function actionDefault($projectid) {
        
    }
    
    public function actionAddTestPlan() {
        $this->addBreadCrumb("Vytvoriť Test Plan", ":Admin:Project:TestPlan:addTestPlan");
        
        $this->template->testSetNames = $this->database->table("test_set")
            ->where("project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");
        $this->template->testCaseNames = $this->database->table("test_case")
            ->where("test_set.project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");
    }
    
    public function createComponentAddTestPlanForm() {
        $form = $this->testPlanFormFactory->createAddForm($this->project);
        $form->onSuccess[] = function() {
            $this->flashMessage("Test plán bol úspešne vytvorený", "success");
            $this->redirect("TestPlan:default");
        };
        return $form;
    }
    
    public function actionEditTestPlan($testPlanID) {
        $this->addBreadCrumb("Upraviť Test Plan", ":Admin:Project:TestPlan:editTestPlan", $testPlanID);
        
        $this->template->testSetNames = $this->database->table("test_set")
            ->where("project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");
        $this->template->testCaseNames = $this->database->table("test_case")
            ->where("test_set.project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");


    }
    
    public function createComponentEditTestPlanForm() {
        $form = $this->testPlanFormFactory->createEditForm($this->project, $this->getParameter("testPlanID"));
        $form->onSuccess[] = function() {
            $this->flashMessage("Test plán bol úspešne upravený", "success");
            $this->redirect("TestPlan:default");
        };
        return $form;
    }
    
    public function actionAddTestSprint() {
        $this->addBreadCrumb("Vytvoriť Test Sprint", ":Admin:Project:TestPlan:addTestSprint");
    }
    
    public function createComponentAddTestPlanSprintForm() {
        $form = $this->testPlanSprintFormFactory->createAddForm($this->project);
        $form->onSuccess[] = function() {

            if ($this->testPlanSprintFormFactory->returnedTestSprintID == -1) {
                $this->flashMessage("Test sprint bol úspešne vytvorený, ale neobsahuje žiadne testovacie scenáre.", "warning");
                $this->redirect("TestPlan:default");
            } else {
                $this->flashMessage("Test Sprint bol úspešne vytvorený", "success");
                $this->redirect("TestPlan:testSprintManagement", $this->testPlanSprintFormFactory->returnedTestSprintID);
            }

        };
        return $form;        
    }
    
    public function actionEditTestSprint($testSprintID) {
        $this->addBreadCrumb("Upraviť Test Sprint", ":Admin:Project:TestPlan:editTestSprint", $testSprintID);
    }
    
    
    public function createComponentEditTestPlanSprintForm() {
        $form = $this->testPlanSprintFormFactory->createEditForm($this->project, $this->getParameter("testSprintID"));
        $form->onSuccess[] = function() {
            $this->flashMessage("Test Sprint bol úspešne upravený", "success");
            $this->redirect("TestPlan:testSprintManagement#b", [$this->testPlanSprintFormFactory->returnedTestSprintID]);
        };
        return $form;        
    }
    
    public function actionTestSprintManagement($testSprintID) {
        $this->template->testSprint = $testSprint = $this->simpleEntityService->getRepository(TestPlanSprint::class)->find($testSprintID);
        $this->removeLastBreadcrumb();
        $this->addBreadCrumb("Test Plan: " . $testSprint->getTestPlan()->getName(), ":Admin:Project:TestPlan:default", ["projectID" => $this->projectID]);
        $this->addBreadCrumb("Test Sprint: " . $testSprint->getName(), ":Admin:Project:TestPlan:default", ["projectID" => $this->projectID]);

        $testers = $this->projectRoleService->getProjectTesters($this->project);
        $this->template->testers = $testers;
        
        $this->template->testSprintID = $testSprintID;
    }

    protected function createComponentSelectSprintForm() {
        $form = new Form();

        $testSprintId = $this->getParameter("testSprintID");
        $testPlanSprint = $this->testPlanSprintService->getById($testSprintId);
        $testPlanSprint = $this->testPlanSprintService->getTestPlanSprintForPlanPairs($testPlanSprint->getTestPlan()->getId());

        $form->addSelect("selectTestSprint", "Vyberte váš Test Sprint", $testPlanSprint)
            ->setDefaultValue($testSprintId);

        $form->addSubmit("send", "Přejít");

        $form->onSuccess[] = [$this, "processSelectForm"];

        return $form;
    }

    public function processSelectForm(Form $form) {
        $values = $form->getValues();
        $this->redirect("this", ["testSprintID" => $values->selectTestSprint]);
    }
    
    public function actionEditTestPlanSprintRole($testSprintID, $testerID) {
        
        $this->template->testSetNames = $this->database->table("test_set")
            ->where("project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");
        $this->template->testCaseNames = $this->database->table("test_case")
            ->where("test_set.project_id = ?", $this->project->getId())
            ->fetchPairs("id", "name");
        
        $tester = $this->userService->getOneById($testerID);
        $this->template->tester = $tester;
        
        $preparedTestPlanSprintCases = $this->getPreparedTestPlanSprintCases($testSprintID, $testerID);
        $this->template->preparedTestPlanSprintCases = $preparedTestPlanSprintCases;
    }
    
    private function getPreparedTestPlanSprintCases($testSprintID, $testerID) {

        $testPlanSprintCases = $this->database->table("test_plan_sprint_case_user")
            ->select("test_plan_sprint_case.id, user.name, user.surname")
            ->where("(test_plan_sprint_case.test_plan_sprint_id = ?) AND (user_id <> ?)", $testSprintID, $testerID)
            ->fetchAll();
        $return = [];
        foreach ($testPlanSprintCases as $tpsc) {
            $return[$tpsc["id"]][] = [
                "name" => $tpsc["name"],
                "surname" => $tpsc["surname"],
            ];
        }
        
        return $return;
    }
    
    public function createComponentTestPlanSprintRoleForm() {
        
        $form = $this->testPlanSprintRoleFormFactory->createForm($this->getParameter("testSprintID"), $this->getParameter("testerID"));
        $form->onSuccess[] = function() {
            $this->flashMessage("Test Sprint Role boli úspešne uložené", "success");
            $this->redirect("TestPlan:testSprintManagement#c", [
                "projectID" => $this->projectID,
                "testSprintID" => $this->getParameter("testSprintID")
            ]);
        };
        return $form;        
    }
    
    public function handleDeleteTestSprint($testSprintID) {
        $testSprint = $this->simpleEntityService->getRepository(TestPlanSprint::class)
            ->find($testSprintID);
        $this->simpleEntityService->delete($testSprint);      
        
        $this->flashMessage("Test Sprint bol úspešne zmazaný", "success");
        $this->redirect("this");
    }
    
    public function handleDeleteTestPlan($testPlanID) {
        $testPlan = $this->simpleEntityService->getRepository(TestPlan::class)
            ->find($testPlanID);
        $this->simpleEntityService->delete($testPlan);

        // HERE GOES LOG (smazat)
        $log = Log::create(LogValues::ACTION_DELETE, LogValues::TAB_TEST_PLAN);
        $log->setDescription("Smazan test plan s ID ".$testPlanID);
        $this->logService->insert($log);

        $this->flashMessage("Test Plan bol úspešne zmazaný", "success");
        $this->redirect("this");

    }


    protected function createComponentTagDate()
    {
        $testSprintID = $this->getPresenter()->getParameter("testSprintID");

        return new Multiplier(function ($tagId) use($testSprintID) {
            $form = $this->tagDatesFormFactory->createTagDatesForm($tagId, $testSprintID);
            $form->onSuccess[] = function() {
                $this->flashMessage("Datum byl úspěšně upravený.", "success");
                $this->redirect("this#d");
            };
            return $form;
        });
    }


}
