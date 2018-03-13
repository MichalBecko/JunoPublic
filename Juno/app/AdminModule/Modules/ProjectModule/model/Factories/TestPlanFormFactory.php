<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use Functions\Functions;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use ProjectModule\Entities\TestPlan;
use ProjectModule\Services\TestPlanService;
use ProjectModule\Services\TestSetService;
use UserModule\Services\User;
use function dump;

/**
 * Description of TestPlanFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var TestPlanService */
    public $testPlanService;
    
    /** @var TestSetService */
    public $testSetService;
    
    private $project;
    
    /** @var Context */
    public $database;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, TestPlanService $testPlanService, TestSetService $testSetService, Context $database) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->testPlanService = $testPlanService;
        $this->testSetService = $testSetService;
        $this->database = $database;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addText("name", "Názov test plánu")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        
        $testSets = $this->testSetService->getAllAsQb()
            ->where("ts.project = :project")
            ->setParameter("project", $this->project)
            ->getQuery()
            ->getResult();
        
        $testPlanSets = $form->addContainer("testPlanSets");
        
        foreach ($testSets as $testSet) {
            $testSetContainer = $testPlanSets->addContainer($testSet->getId());
            foreach ($testSet->testCases as $testCase) {
                $testSetContainer->addCheckbox($testCase->getId(), $testCase->getName())
                    ->getControlPrototype()->__set("approvedspan", $testCase->getApprovedInStyle());
            }
        }

        return $form;
    }

    public function createAddForm($project) {

        $this->project = $project;
        
        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);

        $testPlan = new TestPlan();
        $testPlan->name = $v["name"];
        $testPlan->creator = $this->user->getEntity();
        $testPlan->project = $this->project;
        
        $this->testPlanService->insert($testPlan);
        
        $data = [];
        foreach ($v["testPlanSets"] as $testPlanArr) {
            foreach($testPlanArr as $testCaseID => $val) {
                if ($val) {
                    $data[] = [
                        "test_plan_id" => $testPlan->getId(),
                        "test_case_id" => $testCaseID
                    ];
                }
            }
        }
        if (count($data) > 0) {
            $this->database->table("test_plan_case")->insert($data);
        }

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_PLAN);
        $log->setDescription("Vytvoril test plan s ID ".$testPlan->getId());
        $this->logService->insert($log);
    }

    public function createEditForm($project, $id) {

        $this->project = $project;

        $defaults = $this->testPlanService->getById($id)->toArray();

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];
        
        $testPlanCases = $this->database->table("test_plan_case")
            ->select("test_plan_case.test_case_id, test_case.test_set_id")
            ->where("test_plan_id = ?", $id)
            ->fetchAll();
        
        foreach ($testPlanCases as $testPlan) {
            $testCaseID = $testPlan["test_case_id"];
            $testSetID = $testPlan["test_set_id"];
            
            $defaults["testPlanSets"][$testSetID][$testCaseID] = TRUE;
        }

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);
        
        $testPlan = $this->testPlanService->getById($v["id"]);
        $testPlan->name = $v["name"];
        
        $this->testPlanService->update($testPlan);
        
        $currentTestCases = [];
        foreach ($v["testPlanSets"] as $testPlanArr) {
            foreach($testPlanArr as $testCaseID => $val) {
                if ($val) {
                    $currentTestCases[] = $testCaseID;
                }
            }

        }

        // here we are editing test cases pinned to test plan
        $testPlanCases = Functions::formatToPairs(null, "test_case_id", $this->database->table("test_plan_case")
            ->select("test_plan_case.test_case_id, test_case.test_set_id")
            ->where("test_plan_id = ?", $testPlan->getId())
            ->fetchAll());
        $deletedCheckboxes = array_values(array_diff($testPlanCases, $currentTestCases));
        $this->database->table("test_plan_case")->where("test_case_id IN ?", $deletedCheckboxes)->delete();
        
        $newCheckboxes = array_values(array_diff($currentTestCases, $testPlanCases));
        
        $data = [];
        foreach ($newCheckboxes as $testCaseID) {
            $data[] = [
                "test_plan_id" => $testPlan->getId(),
                "test_case_id" => $testCaseID
            ];
        }
        if (count($data) > 0) {
            $this->database->table("test_plan_case")->insert($data);
        }


        // here we are editing test plan cases pinned to test plan sprints
        // for all sprints
        $testPlanSprints = $this->database->table("test_plan_sprint")
            ->where("test_plan_id = ?", $testPlan->id)
            ->select("id")
            ->fetchPairs(null, "id");
        foreach ($testPlanSprints as $testPlanSprintID) {

            $tpsc = $this->database->table("test_plan_sprint_case")
                ->select("test_plan_case_id")
                ->where("test_plan_sprint_id = ?", $testPlanSprintID)
                ->fetchPairs(null, "test_plan_case_id");
            $testPlanCases = $this->database->table("test_plan_case")
                ->select("id")
                ->where("test_plan_id = ?", $testPlan->id)
                ->fetchPairs(null, "id");
            foreach ($testPlanCases as $testPlanCaseID) {
                if (!in_array($testPlanCaseID, $tpsc)) {

                    $data = [
                        "test_plan_sprint_id" => $testPlanSprintID,
                        "test_plan_case_id" => $testPlanCaseID
                    ];
                    $this->database->table("test_plan_sprint_case")->insert($data);
                }
            }

        }

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_TEST_PLAN);
        $log->setDescription("Zmenen test plan s ID ".$testPlan->id);
        $this->logService->insert($log);
    }


}
