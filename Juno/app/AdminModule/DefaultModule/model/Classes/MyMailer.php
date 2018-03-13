<?php

namespace DefaultModule\Classes;

use SettingsModule\Services\SettingsService,
    Nette\Mail\SmtpMailer,
    Nette\Mail\Message,
    Nette\Mail\SmtpException;

/**
 * Description of MyMailer
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MyMailer  {
    
    /** @var SettingsService */
    public $settingsService;
    
    /** @var SmtpMailer */
    private $smtpMailer;

    /** @var  [] */
    private $options;
    
    public function __construct(SettingsService $settingsService) {
        $this->settingsService = $settingsService;
        
        $options = Functions::formatToPairs("option", "description", $this->settingsService->getAllAsQb()->getQuery()->getResult());

        $options["host"] = $options["mailer_host"];
        $options["port"] = $options["mailer_port"];
        $options["username"] = $options["mailer_username"];
        $options["password"] = $options["mailer_password"];
        $options["secure"] = $options["mailer_secure"];
        $options["timeout"] = $options["mailer_timeout"];
        
        $this->smtpMailer = new SmtpMailer($options);
        $this->options = $options;
    }
    
    public function send(Message $mail) {

        /** Try to send mail, else catch smtp exception */
        try {
            $mail->setFrom($this->options["username"]);

            $this->getSmtpMailer()->send($mail);
            return true;
        } catch (SmtpException $ex) {
            throw new SmtpException($ex->getMessage(), $ex->getCode());
        } 
        
    }
    
    private function getSmtpMailer() {
        return $this->smtpMailer;
    }
    
}
