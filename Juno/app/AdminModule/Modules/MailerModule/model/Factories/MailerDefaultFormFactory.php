<?php

namespace MailerModule\Factories;

use DefaultModule\Factories\DynamicFormFactory;
use DefaultModule\Interfaces\IFormFactory;
use DefaultModule\Services\HydratorService;
use LogModule\Entities\Log;
use LogModule\Services\LogService;
use MailerModule\Entities\MailerDefault;
use MailerModule\Services\MailerDefaultService;
use Nette\Application\UI\Form;
use UserModule\Services\User,
    DefaultModule\Factories\TranslatedFormFactory;

/**
 * Description of MailerDefaultFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerDefaultFormFactory extends DynamicFormFactory implements IFormFactory {

    /** @var MailerDefaultService @inject */
    public $mailerDefaultService;
    
    /** @var HydratorService */
    public $hydratorService;
    
    /** @var LogService */
    public $logService;
    
    /** @var User */
    public $user;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    public function __construct(MailerDefaultService $mailerDefaultService, HydratorService $hydratorService, LogService $logService, User $user, TranslatedFormFactory $translatedFormFactory) {
        $this->mailerDefaultService = $mailerDefaultService;
        $this->hydratorService = $hydratorService;
        $this->logService = $logService;
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
    }
    
    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addText("name", "is.mailer.templateName");
        $form->addText("subject", "is.mailer.subject");
        $form->addTextArea("body", "is.mailer.body", null, 10)->setAttribute("isTinymce", 1);
        
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
        
        $mailerdefault = $this->hydratorService->fromArray($v, new MailerDefault());
        $this->mailerDefaultService->insert($mailerdefault);
        
        $log = new Log();
        $log->setDescription("Vytvoril novú šablónu s ID #".$mailerdefault->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log); 
    }

    public function createEditForm($id) {

        $defaults = $this->mailerDefaultService->getById($id)->toArray();

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        
        $v = $form->getValues(TRUE);
        
        $mailerdefault = $this->hydratorService->fromArray($v, $this->mailerDefaultService->getById($v["id"]));
        $this->mailerDefaultService->update($mailerdefault);
        
        $log = new Log();
        $log->setDescription("Upravil šablónu s ID #".$mailerdefault->getId());
        $log->setResource("Nastavenia");
        $log->setUser($this->user->getEntity());
        $this->logService->insert($log); 
        
    }

}
