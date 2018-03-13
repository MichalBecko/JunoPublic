<?php

namespace MailerModule\Factories;

use DefaultModule\Interfaces\IFormFactory,
    LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory,
    DefaultModule\Classes\MyMailer,
    SettingsModule\Services\SettingsService,
    MailerModule\Entities\Mailer,
    Nette\Mail\Message,
    MailerModule\Services\MailerService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    MailerModule\Entities\MailerAttachment;

/**
 * Description of MailerFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerFormFactory implements IFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var MyMailer @inject */
    public $myMailer;
    
    /** @var SettingsService @inject */
    public $settingsService;
    
    /** @var MailerService @inject */
    public $mailerService;
    
    /** @var IMultimediaSaver @inject */
    public $iMultimediaSaver;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, MyMailer $myMailer, SettingsService $settingsService, MailerService $mailerService, IMultimediaSaver $iMultimediaSaver) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->myMailer = $myMailer;
        $this->settingsService = $settingsService;
        $this->mailerService = $mailerService;
        $this->iMultimediaSaver = $iMultimediaSaver;
    }
    
    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addMultiSelect("recipient", "is.mailer.to")
            ->setAttribute("id", "recipient");
        $form->addText("subject", "is.mailer.subject");
        $form->addText("body", "is.mailer.text");
        $form->addUpload("attachment", "is.mailer.attachment", TRUE);
        
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
        $recipients = $form->getHttpData($form::DATA_LINE, "recipient[]");
        $attachments = $v["attachment"];
        
        $mail = $this->hydratorService->fromArray($v, new Mailer, ["attachment"]);
        foreach ($attachments as $attachment) {
            
            $multimediaSaver = $this->iMultimediaSaver->create($attachment);
            $multimedia = $multimediaSaver->saveAsFile("multimedia/multimedias/");
            
            $mailerAttachment = new MailerAttachment();
            $mailerAttachment->mailer = $mail;
            $mailerAttachment->multimedia = $multimedia;
            
            $mail->addAttachment($mailerAttachment);
        }
        
        $mail->setRecipient(implode(", ", $recipients));
        
        foreach ($recipients as $rec) {
        
            $message = new Message();
            $message->setHtmlBody($mail->getBody());
            $message->setFrom($this->settingsService->findOneByOption("mailer_username")->getDescription());
            $message->setSubject($mail->getSubject());

            foreach ($attachments as $attachment) {
                if ($attachment->isOk()) {
                    $message->addAttachment($attachment->getName(), $attachment->getContents());
                }
            }
        
            $message->addTo($rec);
            
            if (!$this->myMailer->send($message)) { 
//                $this->flashMessage("Odosielanie zlyhalo. Preverte prosím nastavenia SMTP servera.", "danger");
                return false;
            }
        }
        
        $insertedMail = $this->mailerService->insert($mail);
        
        $log = new Log();
        $log->setUser($this->user->getEntity());
        $log->setDescriptionAndEncode("is.mailer.sentMail", ['id' => $insertedMail->getId()]);
        $log->setResource("is.modulName.mailer");
        $this->logService->insert($log);
    }

    public function createEditForm($id) {
    }

    public function edit(Form $form) {
    }

}
