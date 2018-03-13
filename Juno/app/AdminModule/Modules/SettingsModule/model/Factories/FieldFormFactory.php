<?php

namespace SettingsModule\Factories;

use DefaultModule\Factories\DynamicFormFactory,
    DefaultModule\Interfaces\IFormFactory,
    Nette\Application\UI\Form,
    ContactModule\Services\ContactGroupService,
    DefaultModule\Classes\DefaultValues,
    DefaultModule\Classes\Functions,
    DefaultModule\Services\HydratorService,
    ContactModule\Entities\ContactField,
    ContactModule\Services\ContactFieldService,
    Nette\Utils\Strings,
    LogModule\Entities\Log,
    LogModule\Services\LogService,
    UserModule\Services\User,
    DefaultModule\Factories\TranslatedFormFactory;

/**
 * Description of FieldFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class FieldFormFactory extends DynamicFormFactory implements IFormFactory {

    /** @var ContactGroupService */
    public $contactGroupService;
    
    /** @var HydratorService */
    public $hydratorService;
    
    /** @var ContactFieldService */
    public $contactFieldService;
    
    /** @var LogService */
    public $logService;
    
    /** @var User */
    public $user;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    public function __construct(HydratorService $hydratorService,  LogService $logService, User $user, TranslatedFormFactory $translatedFormFactory) {
        $this->hydratorService = $hydratorService;
        $this->logService = $logService;
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
    }

    public function getForm() {

        $types = DefaultValues::getFieldTypes();
        $colWidth = DefaultValues::getColWidth();
        $contactGroups = Functions::formatToPairs("id", "name", $this->contactGroupService->getAll());
        
        $form = $this->translatedFormFactory->create();

        $form->addText("label", "is.default.name");
        $form->addSelect("contactGroup", "is.settings.group", $contactGroups);
        $form->addSelect("type", "is.settings.type", $types)
                ->addCondition(Form::EQUAL, 'TextArea')
                ->toggle("isTinymce")
                ->endCondition()
                ->addCondition(Form::EQUAL, 'Select')
                ->toggle("options")
                ->endCondition();
        $form->addText("class", "Class");
        $form->addText("options", "is.settings.options");
        $form->addSelect("colWidth", "is.settings.colWidth", $colWidth);
        $form->addText("sort", "is.default.sort");
        $form->addCheckbox("isRequired", "is.default.requiredField");
        $form->addCheckbox("isInTable", "is.settings.showInTable");
        $form->addCheckbox("isTinymce", "is.settings.showAsTinymce")->setDefaultValue(TRUE);
        $form->addCheckbox("isNewline", "is.settings.showOnNewLine");

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
        $v["isDeletable"] = TRUE;
        
        $contactField = $this->hydratorService->fromArray($v, new ContactField());
        $contactField->setName(Strings::webalize($contactField->getLabel()));
        
        $this->contactFieldService->insert($contactField);
        
        $log = new Log();
        $log->setDescription("Vytvoril nové pole s ID #".$contactField->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log);  
    }

    public function createEditForm($id) {

        $field = $this->contactFieldService->getById($id);
        $defaults = $field->toArray(["contactGroup"]);

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form["contactGroup"]->setDefaultValue($field->getContactGroup()->getId());
        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        
        $v = $form->getValues(TRUE);
        
        $contactField = $this->hydratorService->fromArray($v, $this->contactFieldService->getById($v["id"]));
        $contactField->setName(Strings::webalize($contactField->getLabel()));
        
        $this->contactFieldService->update($contactField);
        
        $log = new Log();
        $log->setDescription("Upravil pole s ID #".$contactField->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log);  
    }

}
