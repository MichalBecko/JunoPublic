<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\DynamicFormFactory;
use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use DefaultModule\Services\SimpleEntityService;
use Functions\Functions;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use LogModule\Services\LogService;
use MultimediaModule\Interfaces\IMultimediaSaver;
use MultimediaModule\Services\MultimediaService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use Nette\Http\FileUpload;
use Nette\Utils\FileSystem;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Entities\TagTestCase;
use ProjectModule\Entities\TestCase;
use ProjectModule\Entities\TestSet;
use ProjectModule\Entities\TestStep;
use ProjectModule\Services\TestCaseService;
use ProjectModule\Services\TestSetService;
use UserModule\Services\User;
use function dump;

/**
 * Description of TestCaseFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestCaseFormFactory extends DynamicFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var TestCaseService */
    public $testCaseService;
    
    /** @var IMultimediaSaver */
    public $iMultimediaSaver;
    
    /** @var TestSetService */
    public $testSetService;
    
    /** @var MultimediaService */
    public $multimediaService;
    
    /** @var SimpleEntityService */
    public $simpleEntitySerice;

    /** @var  Context */
    public $database;
    
    public $presenter;
    
    public $project;

    public $testSetId;

    /**
     * TestCaseFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param HydratorService $hydratorService
     * @param TranslatedFormFactory $translatedFormFactory
     * @param TestCaseService $testCaseService
     * @param IMultimediaSaver $iMultimediaSaver
     * @param TestSetService $testSetService
     * @param MultimediaService $multimediaService
     * @param SimpleEntityService $simpleEntitySerice
     * @param Context $database
     */
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, TestCaseService $testCaseService, IMultimediaSaver $iMultimediaSaver, TestSetService $testSetService, MultimediaService $multimediaService, SimpleEntityService $simpleEntitySerice, Context $database)
    {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->testCaseService = $testCaseService;
        $this->iMultimediaSaver = $iMultimediaSaver;
        $this->testSetService = $testSetService;
        $this->multimediaService = $multimediaService;
        $this->simpleEntitySerice = $simpleEntitySerice;
        $this->database = $database;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();
        $priorities = DefaultValues::getPriorities();
        $testSetsQB = $this->testSetService->getAllAsQB()
            ->where("ts.project = :project")
            ->setParameter("project", $this->project)
            ->getQuery()
            ->getResult();
        $testSets = Functions::formatToPairs("id", "name", $testSetsQB);
        
        $form->addText('name', 'Name:')
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        $form->addTextArea('description', 'Description:');
        $form->addTextArea('result', 'Result:');
        $form->addCheckbox('approved', 'Schválené');
        $form->addSelect('priority', 'Priority:', $priorities);
        
        $form->addSelect("testSet", "Test set", $testSets);
        
        $form->addUpload("multimedia", "Multimedia", TRUE);
        
        $testSteps = $form->addContainer("testSteps");
        $testSteps->addTextArea("precondition", "Precondition");
        $testSteps->addTextArea("expectedResult", "Expected result");
        
        return $form;
    }

    public function createAddForm($project, $presenter) {
        $this->presenter = $presenter;
        $this->project = $project;
        
        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);
        
        if (is_null($v["testSet"])) {
            $form->onError(TRUE);
        }

        // unique name checking
        $nameExists = $this->database->table("test_case")
            ->select("name")
            ->where("name = ?", $v["name"])->fetchField();
        if ($nameExists) {
            $this->presenter->flashMessage("Meno test casu už existuje", "danger");
            $this->presenter->redirect("this");
        }
        
        $httpData = $form->getHttpData();
        $multimedias = $httpData["multimedia"];
        $countTestSteps = count($httpData["testSteps"]["precondition"]);
        $testSteps = $httpData["testSteps"];
        
        $testCase = new TestCase();
        $testCase->name = $v["name"];
        $testCase->description = $v["description"];
        $testCase->result = $v["result"];
        $testCase->priority = $v["priority"];
        $testCase->approved = $v["approved"];
        $testCase->creator = $this->user->getEntity();
        $testCase->testSet = $this->testSetService->getById($v["testSet"]);

        $this->testSetId = $v["testSet"];
        
        foreach ($multimedias as $mul) {
            if ($mul instanceof FileUpload) {
                $multimediaSaver = $this->iMultimediaSaver->create($mul);
                $multimedia = $multimediaSaver->saveAsFile("multimedia/projects/" . $this->project->getId() . "/testcases/");
                $testCase->addMultimedia($multimedia);
            }
        }
        
        for ($i = 0; $i < $countTestSteps; $i++) {
            $testStep = new TestStep();
            $testStep->precondition = $testSteps["precondition"][$i];
            $testStep->expectedResult = $testSteps["expectedResult"][$i];
            $testStep->testCase = $testCase;
            $testStep->creator = $this->user->getEntity();
            
            $testCase->addTestStep($testStep);
        }

        if (isset($httpData["tagselect"])) {
            foreach ($httpData["tagselect"] as $httpTag) {
                $tag = new TagTestCase();
                $tag->testCase = $testCase;
                $tag->name = $httpTag;

                $testCase->addTag($tag);
            }
        }

        $this->testCaseService->insert($testCase);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Vytvořil Test Case s ID ".$testCase->getId());
        $this->logService->insert($log);
    }

    public function createEditForm($project, $id, $presenter) {
        $this->project = $project;
        $this->presenter = $presenter;
        
        $defaults = $this->testCaseService->getById($id)->toArray();
        $defaults["testSet"] = $defaults["testSet"]["id"];
        
        $form = $this->getForm();
        $form->addHidden("id", $id);
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);

        $httpData = $form->getHttpData();
        $testCase = $this->testCaseService->getById($v["id"]);

        // unique name checking
        $nameExists = $this->database->table("test_case")
            ->select("name")
            ->where("name = ? AND id <> ?", $v["name"], $v["id"])->fetchField();
        if ($nameExists) {
            $this->presenter->flashMessage("Meno test casu už existuje", "danger");
            $this->presenter->redirect("this");
        }
        
        $testCase->name = $v["name"];
        $testCase->description = $v["description"];
        $testCase->result = $v["result"];
        $testCase->priority = $v["priority"];
        $testCase->approved = $v["approved"];
        $testCase->testSet = $this->testSetService->getById($v["testSet"]);

        $this->testSetId = $v["testSet"];
        
        // insert multimedias
        $multimedias = $httpData["multimedia"];
        foreach ($multimedias as $mul) {
            if ($mul instanceof FileUpload) {
                $multimediaSaver = $this->iMultimediaSaver->create($mul);
                $multimedia = $multimediaSaver->saveAsFile("multimedia/projects/" . $this->project->getId() . "/testcases/");
                $testCase->addMultimedia($multimedia);
            }
        }
        
        // delete removed multimedias
        $currentMultimedias = Functions::formatToPairs(NULL, "id", $testCase->multimedias);
        if (array_key_exists("multimediaCurrent", $httpData)) {
            $stayedMultimedias = $httpData["multimediaCurrent"];
        } else {
            $stayedMultimedias = [];
        }
        $deletedMultimedias = array_diff($currentMultimedias, $stayedMultimedias);
        foreach ($deletedMultimedias as $mulID) {
            if (!is_null($mulID)) {
                $multimedia = $this->multimediaService->findById($mulID);
                $testCase->removeMultimedia($multimedia);
                FileSystem::delete($multimedia->getPath());
            }
        }
        
       
        // delete removed test steps
        $currentTestSteps = Functions::formatToPairs(NULL, "id", $testCase->testSteps);
        if (array_key_exists("testStepsCurrent", $httpData)) {
            $stayedTestSteps = $httpData["testStepsCurrent"]["id"];
        } else {
            $stayedTestSteps = [];
        }
        $testStepRepository = $this->simpleEntitySerice->getRepository(TestStep::class);
        foreach ($currentTestSteps as $testStepID) {
            
            if (in_array($testStepID, $stayedTestSteps)) {
                $testStep = $testStepRepository->find($testStepID);
                $currID = array_keys($httpData["testStepsCurrent"]["id"], $testStepID)[0];
                $testStep->precondition = $httpData["testStepsCurrent"]["precondition"][$currID];
                $testStep->expectedResult = $httpData["testStepsCurrent"]["expectedResult"][$currID];
            } else {
                $testStep = $this->simpleEntitySerice->getRepository(TestStep::class)->find($testStepID);
                $testCase->removeTestStep($testStep);
            }
        }
        
         // add new test steps
        $countTestSteps = count($httpData["testSteps"]["precondition"]);
        $testSteps = $httpData["testSteps"];
        for ($i = 0; $i < $countTestSteps; $i++) {
            $testStep = new TestStep();
            $testStep->precondition = $testSteps["precondition"][$i];
            $testStep->expectedResult = $testSteps["expectedResult"][$i];
            $testStep->testCase = $testCase;
            $testStep->creator = $this->user->getEntity();
            
            if ($testStep->precondition == "" && $testStep->expectedResult == "") {
                continue;
            }
            
            $testCase->addTestStep($testStep);
        }

        // TAGS
        $currentTags = $testCase->getTags(TRUE);
        $tagsForDelete = isset($httpData["tagselect"]) ? array_diff_key($currentTags, array_flip($httpData["tagselect"])) : [];

        // deleting tags
        if (isset($httpData["tagselect"])) {
            foreach ($tagsForDelete as $keyTag => $nothing) {
                $tagTestCase = $this->simpleEntitySerice->getRepository(TagTestCase::class)->find($keyTag);
                $testCase->getTags()->removeElement($tagTestCase);
            }
        } else {
            $tagsForDelete = $this->simpleEntitySerice->getRepository(TagTestCase::class)->findBy(["testCase" => $v["id"]]);
            foreach ($tagsForDelete as $key => $tagTestSet) {
                $this->simpleEntitySerice->remove($tagTestSet);
            }
        }

        if (isset($httpData["tagselect"])) {
            foreach ($httpData["tagselect"] as $httpTag) {

                // if is numeric tag, it means it is in database
                // if it is NOT, it is a string and it is a new one
                if (!is_numeric($httpTag)) {
                    $tag = new TagTestCase();
                    $tag->testCase = $testCase;
                    $tag->name = $httpTag;

                    $testCase->addTag($tag);
                }
            }
        }

        $this->testCaseService->update($testCase);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Změnil Test Case s ID ".$testCase->getId());
        $this->logService->insert($log);
    }
    
    
    public function createBulkForm($project) {

        $this->project = $project;
        
        $form = $this->translatedFormFactory->create();
        
        $testSetsQB = $this->testSetService->getAllAsQB()
            ->where("ts.project = :project")
            ->setParameter("project", $this->project)
            ->getQuery()
            ->getResult();
        $testSets = Functions::formatToPairs("id", "name", $testSetsQB);

        $form->addSelect("testSet", "Test set", $testSets);
        $form->addText("name", "Názov nového test set");

        $form->addCheckbox("createNewTestSet", "Vytvoriť nový test set")
            ->addCondition($form::EQUAL, TRUE)
            ->toggle("showName")
            ->toggle("showTestSet", FALSE);
        
        
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "addBulkForm"];
        
        return $form;
    }
    
    public function addBulkForm(Form $form) {
        $v = $form->getValues();
        
        $httpData = $form->getHttpData();
        $user = $this->user->getEntity();
        
        if ($v["createNewTestSet"]) {
            $testSet = new TestSet();
            $testSet->name = $v["name"];
            $testSet->creator = $user;
            $testSet->project = $this->project;
        } else {
            if (is_null($v["testSet"])) {
                $form->onError(TRUE);
            }
            $testSet = $this->testSetService->getById($v["testSet"]);
            $this->testSetId = $v["testSet"];
        }
        
        foreach ($httpData["testCase"] as $testCaseName) {
                
            $testCase = new TestCase();
            $testCase->name = $testCaseName;
            $testCase->testSet = $testSet;
            $testCase->creator = $user;
            $testCase->priority = 1;

            $testSet->testCases->add($testCase);
        }
        
        $this->testSetService->insert($testSet);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Vytvořil Bulk Test Case s ID ".$testSet->getId());
        $this->logService->insert($log);
    }



}
