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
use ProjectModule\Entities\Project;
use ProjectModule\Entities\TestPlanSprint;
use ProjectModule\Services\TestPlanService;
use ProjectModule\Services\TestPlanSprintService;
use UserModule\Services\User;

/**
 * Description of TestSprintFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintFormFactory {

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
    
    /** @var TestPlanSprintService */
    public $testPlanSprintService;
    
    /** @var Project */
    private $project;

    /** @var  Context */
    private $database;
    
    public $returnedTestSprintID;

    /**
     * TestPlanSprintFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param HydratorService $hydratorService
     * @param TranslatedFormFactory $translatedFormFactory
     * @param TestPlanService $testPlanService
     * @param TestPlanSprintService $testPlanSprintService
     * @param Context $database
     */
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, TestPlanService $testPlanService, TestPlanSprintService $testPlanSprintService, Context $database) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->testPlanService = $testPlanService;
        $this->testPlanSprintService = $testPlanSprintService;
        $this->database = $database;
    }


    public function getForm() {

        $testPlans = Functions::formatToPairs("id", "name", $this->testPlanService->getAllAsQB()
            ->where("tp.project = :project")
            ->setParameter("project", $this->project)
            ->getQuery()
            ->getResult());
        
        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Názov test sprintu")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        $form->addText("startDate", "Začiatok")
            ->setRequired("Povinné pole")
            ->addCondition($form::FILLED, "Musíte zadať začiatok");
        $form->addText("endDate", "Koniec")
            ->setRequired("Povinné pole")
            ->addCondition($form::FILLED, "Musíte zadať koniec");
        $form->addSelect("testPlan", "Test plan", $testPlans)
            ->setRequired("Pre vytvorenie text sprintu je potrebné mať vytvorený aspon jeden test plan.")
            ->addCondition($form::FILLED, "Musíte zadať test plán");

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

        $testPlanSprint = $this->hydratorService->fromArray($v, new TestPlanSprint());
        $testPlanSprint->creator = $this->user->getEntity();

        $this->testPlanSprintService->insert($testPlanSprint);
        $this->returnedTestSprintID = $testPlanSprint->getId();

        $testPlan = $this->testPlanService->getById($v["testPlan"]);
        if (count($testPlan->getTestPlanCases()) == 0) {
            $this->returnedTestSprintID = -1;
        } else {
            $data = [];
            // these are predefined test cases which will be tested in test plan sprint
            foreach ($testPlanSprint->getTestPlan()->getTestPlanCases() as $testPlanCase) {

                $data[] = [
                    "test_plan_sprint_id" => $testPlanSprint->getId(),
                    "test_plan_case_id" => $testPlanCase->getId()
                ];
            }

            $this->database->table("test_plan_sprint_case")->insert($data);
        }

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_PLAN);
        $log->setDescription("Vytvořil testSprint s ID ".$testPlanSprint->getId());
        $this->logService->insert($log);
    }

    public function createEditForm($project, $testSprintID) {

        $this->project = $project;
        
        $defaults = $this->testPlanSprintService->getById($testSprintID)->toArray();
        $defaults["testPlan"] = $defaults["testPlan"]["id"];

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];
        
        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);
        
        $testPlanSprint = $this->hydratorService->fromArray($v, $this->testPlanSprintService->getById($v["id"]));
        
        $this->testPlanSprintService->update($testPlanSprint);
        $this->returnedTestSprintID = $testPlanSprint->getId();

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_TEST_PLAN);
        $log->setDescription("Upravil testSprint s ID ".$testPlanSprint->getId());
        $this->logService->insert($log);
    }

}
