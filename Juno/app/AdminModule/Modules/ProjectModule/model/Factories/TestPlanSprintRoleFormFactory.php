<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use Functions\Functions;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use UserModule\Services\User;

/**
 * Description of TestPlanSprintRoleFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintRoleFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var Context */
    public $database;

    private $testSprintID;
    private $testPlanID;
    private $userID;
    
    public function __construct(LogService $logService, User $user, TranslatedFormFactory $translatedFormFactory, Context $database) {
        $this->logService = $logService;
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->database = $database;
    }

    
    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $testPlanSprintCases = $this->database->table("test_plan_sprint_case")
            ->select("test_plan_sprint_case.id, test_plan_case.test_case.test_set.id AS testSetID, test_plan_case.test_case.test_set.name AS testSetName,
             test_plan_case.test_case.id AS testCaseID, test_plan_case.test_case.name AS testCaseName")
            ->where("test_plan_sprint_id = ?", $this->testSprintID)
            ->fetchAll();

        $testPlanSets = $form->addContainer("testPlanSets");
        foreach ($testPlanSprintCases as $tpsc) {
            if ($testPlanSets->offsetExists($tpsc["testSetID"])) {
                $container = $testPlanSets[$tpsc["testSetID"]];
            } else {
                $container = $testPlanSets->addContainer($tpsc["testSetID"]);
            }

            $container->addCheckbox($tpsc["id"], $tpsc["testCaseName"]);
        }

        return $form;
    }

    public function createForm($testSprintID, $userID) {

        $this->testSprintID = $testSprintID;
        $this->userID = $userID;
        $this->testPlanID = $this->database->table("test_plan_sprint")->where("id = ?", $testSprintID)->fetchField("test_plan_id");
        
        
        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        $testPlanSprintCaseUsers = $this->database->table("test_plan_sprint_case_user")
            ->select("test_plan_sprint_case_id, test_plan_sprint_case.test_plan_case.test_case.test_set_id")
            ->where("user_id = ? AND test_plan_sprint_case.test_plan_sprint_id = ?", $this->userID, $this->testSprintID)
            ->fetchAll();
        $defaults = [];

        foreach ($testPlanSprintCaseUsers as $tpscID => $testPlan) {
            $testPlanSprintCaseUserID = $testPlan["test_plan_sprint_case_id"];
            $testSetID = $testPlan["test_set_id"];

            $defaults["testPlanSets"][$testSetID][$testPlanSprintCaseUserID] = TRUE;
        }
        $form->setDefaults($defaults);

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);


        $currentTestPlanCases = [];
        foreach ($v["testPlanSets"] as $testPlanArr) {
            foreach($testPlanArr as $testPlanCaseID => $val) {
                if ($val) {
                    $currentTestPlanCases[] = $testPlanCaseID;
                }
            }
        }

        $testPlanSprintCasesUser = Functions::formatToPairs(null, "test_plan_sprint_case_id", $this->database->table("test_plan_sprint_case_user")
            ->select("test_plan_sprint_case_user.id, test_plan_sprint_case_id")
            ->where("test_plan_sprint_case.test_plan_sprint_id = ? AND user_id = ?", $this->testSprintID, $this->userID)
            ->fetchAll());

        $deletedCheckboxes = array_values(array_diff($testPlanSprintCasesUser, $currentTestPlanCases));
        $this->database->table("test_plan_sprint_case_user")->where("(test_plan_sprint_case_id IN ?) AND (user_id = ?)", $deletedCheckboxes, $this->userID)->delete();
        
        $newCheckboxes = array_values(array_diff($currentTestPlanCases, $testPlanSprintCasesUser));
        
        $data = [];
        foreach ($newCheckboxes as $testPlanCaseID) {
            $data[] = [
                "user_id" => $this->userID,
                "test_plan_sprint_case_id" => $testPlanCaseID,
            ];
        }
        if (count($data) > 0) {
            $this->database->table("test_plan_sprint_case_user")->insert($data);
        }
    }

}
