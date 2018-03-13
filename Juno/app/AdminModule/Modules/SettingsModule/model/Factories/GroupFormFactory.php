<?php

namespace SettingsModule\Factories;

use DefaultModule\Factories\DynamicFormFactory,
    DefaultModule\Interfaces\IFormFactory,
    Nette\Application\UI\Form,
    ContactModule\Services\ContactGroupService,
    ContactModule\Entities\ContactGroup,
    LogModule\Entities\Log,
    LogModule\Services\LogService,
    UserModule\Services\User,
    DefaultModule\Factories\TranslatedFormFactory;

/**
 * Description of groupFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class GroupFormFactory extends DynamicFormFactory implements IFormFactory {

    /** @var ContactGroupService */
    public $contactGroupService;
    
    /** @var LogService */
    public $logService;
    
    /** @var User */
    public $user;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    public function __construct(LogService $logService, User $user, TranslatedFormFactory $translatedFormFactory) {
        $this->logService = $logService;
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
    }
    
    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addText("name", "is.default.name");

        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        
        $v = $form->getValues();
        
        $group = new ContactGroup();
        $group->setName($v["name"]);
        $this->contactGroupService->insert($group);
        
        $log = new Log();
        $log->setDescription("Vytvoril novú skupinu s ID #".$group->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log);  
    }

    public function createEditForm($id) {

        $defaults = $this->contactGroupService->getById($id)->toArray();

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        
        $v = $form->getValues();
        
        $group = $this->contactGroupService->getById($v["id"]);
        $group->setName($v["name"]);
        $this->contactGroupService->update($group);
        
        $log = new Log();
        $log->setDescription("Upravil skupinu s ID #".$group->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log);
    }

}
