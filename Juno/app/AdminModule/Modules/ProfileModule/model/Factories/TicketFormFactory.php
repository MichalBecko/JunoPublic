<?php

namespace ProfileModule\Factories;

use DefaultModule\Classes\MyMailer;
use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Mail\Message;
use ProjectModule\Classes\DefaultValues;
use UserModule\Services\User;
use function dump;

/**
 * Description of TicketFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TicketFormFactory {
    
    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var MyMailer */
    public $myMailer;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, MyMailer $myMailer) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->myMailer = $myMailer;
    }
    
    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Meno")
            ->setDisabled();
        $form->addEmail("mail", "E-mail")
            ->setDisabled();
        $form->addText("title", "Nadpis tiketu");
        $form->addTextArea("description", "Popis", null, 10);
        $form->addUpload("multimedia", "Multimedia", TRUE);

        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];
        
        $form["name"]->setDefaultValue($this->user->getEntity()->getFullName());
        $form["mail"]->setDefaultValue($this->user->getEntity()->getEMail());

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);

        $description = "<p>Meno: ". $this->user->getEntity()->getFullName() ."</p>"
                . "<p>E-mail: ". $this->user->getEntity()->getEMail() ."</p>"
                . "<p>Popis: "
                . "". $v["description"]."</p>";
        
        $message = new Message();
        $message->addTo(DefaultValues::$CONTACT_MAIL);
        $message->setSubject($v["title"]);
        $message->setHtmlBody($description);
        
        $attachments = $form->getHttpData();
        foreach ($attachments["multimedia"] as $fileUpload) {
            if ($fileUpload instanceof FileUpload) {
                if ($fileUpload->size < DefaultValues::$MAX_FILE_SIZE) {
                    $message->addAttachment($fileUpload->getName(), $fileUpload->getContents());
                } else {
                    $form->onError($this);
                    break;
                }
            }
        }
        
        $this->myMailer->send($message);

//        $log = new Log();
//        $log->setDescriptionAndEncode("is.", ["id" => $X->getId()]);
//        $log->setResource("is.modulName.");
//        $log->setUser($this->user->getEntity());
//        $this->logService->insert($log);
    }

}
