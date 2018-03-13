<?php

namespace MailerModule\Factories;

use LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory,
    SettingsModule\Services\SettingsService;

/**
 * Description of MailerSettingsFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerSettingsFormFactory   {

    /** @var LogService */
    public $logService;
    
    /** @var SettingsService */
    public $settingsService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    public function __construct(LogService $logService, SettingsService $settingsService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory) {
        $this->logService = $logService;
        $this->settingsService = $settingsService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addText("mailer_host", "is.settings.host")
            ->setDefaultValue($this->settingsService->findOneByOption("mailer_host")->getDescription())
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80]);
        $form->addText("mailer_port", "is.settings.port")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 20])
            ->setDefaultValue($this->settingsService->findOneByOption("mailer_port")->getDescription());
        $form->addText("mailer_username", "is.settings.username")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 80])
            ->setDefaultValue($this->settingsService->findOneByOption("mailer_username")->getDescription());
        $form->addPassword("mailer_password", "is.settings.password");
        $form->addText("mailer_secure", "is.settings.security")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 20])
            ->setDefaultValue($this->settingsService->findOneByOption("mailer_secure")->getDescription());
        $form->addText("mailer_timeout", "is.settings.timeout")
            ->setRequired("Povinné pole")
            ->addRule($form::LENGTH, "Minimálne %d a maximálne %d znakov", [1, 20])
            ->setDefaultValue($this->settingsService->findOneByOption("mailer_timeout")->getDescription());

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
        
        //foreach settings we set a new description, ez
        foreach ($v as $option => $newDescription) {
            
            if ($option == "mailer_password") {
                
                if ($newDescription != "") {
                    $row = $this->settingsService->findOneByOption($option);
                    $row->setDescription($newDescription);

                    $this->settingsService->update($row);
                }
                
            } else {
                $row = $this->settingsService->findOneByOption($option);
                $row->setDescription($newDescription);

                $this->settingsService->update($row);
            }
        }

//        $log = new Log();
//        $log->setUser($this->user->getEntity());
//        $log->setDescription("Upravil SMTP nastavenia");
//        $log->setResource($this->getResource());
//        $this->logService->insert($log);
//
//        $this->flashMessage("SMTP nastavenia boli úspešne upravené", "success");
//        $this->redirect(":Admin:Settings:Settings:specific#mailer");
    }

}
