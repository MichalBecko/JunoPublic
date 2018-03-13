<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use DefaultModule\Services\SimpleEntityService;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use ProjectModule\Entities\Project;
use ProjectModule\Entities\TagTestSet;
use ProjectModule\Entities\TestSet;
use ProjectModule\Services\TestSetService;
use UserModule\Services\User;

/**
 * Description of TestSetFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestSetFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var TestSetService */
    public $testSetService;

    /** @var  Context */
    public $database;
    
    /** @var Project */
    public $project;

    /** @var  SimpleEntityService */
    public $simpleEntityService;

    public $presenter;

    /**
     * TestSetFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param HydratorService $hydratorService
     * @param TranslatedFormFactory $translatedFormFactory
     * @param TestSetService $testSetService
     * @param Context $database
     */
    public function __construct(SimpleEntityService $simpleEntityService, LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, TestSetService $testSetService, Context $database)
    {
        $this->simpleEntityService = $simpleEntityService;
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->testSetService = $testSetService;
        $this->database = $database;
    }


    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Názov")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        $form->addTextArea("description", "Popis");

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

        // unique name checking
        $nameExists = $this->database->table("test_set")
            ->select("name")
            ->where("name = ?", $v["name"])->fetchField();
        if ($nameExists) {
            $this->presenter->flashMessage("Meno test setu už existuje", "danger");
            $this->presenter->redirect("this");
        }

        $httpData = $form->getHttpData();

        $testSet = new TestSet();
        $testSet->name = $v["name"];
        $testSet->description = $v["description"];
        $testSet->creator = $this->user->getEntity();
        $testSet->project = $this->project;

        if (isset($httpData["tagselect"])) {
            foreach ($httpData["tagselect"] as $httpTag) {
                $tag = new TagTestSet();
                $tag->testSet = $testSet;
                $tag->name = $httpTag;

                $testSet->addTag($tag);
            }
        }
        
        $this->testSetService->insert($testSet);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Vytvořil Test Set s ID ".$testSet->getId());
        $this->logService->insert($log);
    }

    public function createEditForm($id, $presenter) {
        $this->presenter = $presenter;

        $defaults = $this->testSetService->getById($id)->toArray();

        $form = $this->getForm();
        $form->addHidden("id", $id);
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);

        // unique name checking
        $nameExists = $this->database->table("test_set")
            ->select("name")
            ->where("name = ? AND id <> ?", $v["name"], $v["id"])->fetchField();
        if ($nameExists) {
            $this->presenter->flashMessage("Meno test setu už existuje", "danger");
            $this->presenter->redirect("this");
        }
        
        $testSet = $this->testSetService->getById($v["id"]);
        $testSet->name = $v["name"];
        $testSet->description = $v["description"];

        $httpData = $form->getHttpData();

        // TAGS
        $currentTags = $testSet->getTags(TRUE);
        $tagsForDelete = isset($httpData["tagselect"]) ? array_diff_key($currentTags, array_flip($httpData["tagselect"])) : [];

        // deleting tags
        if (isset($httpData["tagselect"])) {
            foreach ($tagsForDelete as $keyTag => $nothing) {
                $tagTestSet = $this->simpleEntityService->getRepository(TagTestSet::class)->find($keyTag);
                $testSet->getTags()->removeElement($tagTestSet);
            }
        }else {
            $tagsForDelete = $this->simpleEntityService->getRepository(TagTestSet::class)->findBy(["testSet" => $v["id"]]);
            foreach ($tagsForDelete as $key => $tagTestSet) {
                $this->simpleEntityService->remove($tagTestSet);
            }
        }

        if (isset($httpData["tagselect"])) {
            foreach ($httpData["tagselect"] as $httpTag) {

                // if is numeric tag, it means it is in database
                // if it is NOT, it is a string and it is a new one
                if (!is_numeric($httpTag)) {
                    $tag = new TagTestSet();
                    $tag->testSet = $testSet;
                    $tag->name = $httpTag;

                    $testSet->addTag($tag);
                }
            }
        }
        
        $this->testSetService->update($testSet);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Upravil Test Set s ID ".$testSet->getId());
        $this->logService->insert($log);
    }

}
