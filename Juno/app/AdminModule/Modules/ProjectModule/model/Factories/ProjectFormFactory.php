<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Utils\FileSystem;
use ProjectModule\Entities\Project;
use ProjectModule\Services\ProjectService;
use UserModule\Services\User;

/**
 * Description of ProjectFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var ProjectService */
    public $projectService;
    
    private $project;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, ProjectService $projectService) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->projectService = $projectService;
    }

    public function getForm() {
        $form = $this->translatedFormFactory->create();
        
        $form->addText("name", "Názov projektu")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        $form->addTextArea("description", "Popis projektu");

        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);

        $project = new Project();
        $project->setName($v["name"]);
        $project->setDescription($v["description"]);
        $project->setCreator($this->user->getEntity());
        
        $this->projectService->insert($project);
        
        // create directory
        FileSystem::createDir("multimedia/projects/".$project->getId(), 0777);
        FileSystem::createDir("multimedia/projects/".$project->getId()."/testcases", 0777);
        FileSystem::createDir("multimedia/projects/".$project->getId()."/issues", 0777);

        $project->setName($v["name"]);
        $this->projectService->update($project);
        
        $this->user->refreshAuthorizator();

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_PROJECTS);
        $log->setDescription("Vytvoril projekt s ID ".$project->getId());
        $this->logService->insert($log);
    }
    
    public function createEditForm($project) {
        $this->project = $project;
        
        $form = $this->getForm();
        $form->addSubmit("submit", "");
        
        $form["name"]->setDefaultValue($this->project->getName());
        $form["description"]->setDefaultValue($this->project->getDescription());

        $form->onSuccess[] = [$this, "editForm"];
        return $form;
    }
    
    public function editForm(Form $form) {
        $v = $form->getValues();
        
        $this->project->name = $v["name"];
        $this->project->description = $v["description"];
        $this->projectService->update($this->project);

        $this->user->refreshAuthorizator();

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_SETTINGS);
        $log->setDescription("Upravil projekt s ID ".$this->project->id);
        $this->logService->insert($log);
    }
    
    public function createDeleteForm($project) {
        
        $this->project = $project;
        
        $form = new Form();
        $form->addText("name", "Zadajte názov projektu a odkliknite myšou z textového poľa pre poslednú kontrolu zmazania.")
            ->addCondition($form::EQUAL, $this->project->getName())
            ->toggle("deleteProjectSubmitButton")
            ->endCondition()
            ->addCondition($form::NOT_EQUAL, $this->project->getName())
            ->setRequired("Názov sa musí rovnať názvu projektu")
            ->endCondition();
        
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "deleteForm"];

        return $form;
    }
    
    public function deleteForm(Form $form) {
        
        $projectID = $this->project->getId();
        $this->projectService->delete($this->project);
        
        FileSystem::delete("multimedia/projects/" . $projectID);

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_DELETE, LogValues::TAB_PROJECTS);
        $log->setDescription("Smazán projekt s ID ". $projectID);
        $this->logService->insert($log);

        $this->user->refreshAuthorizator();
    }

}
