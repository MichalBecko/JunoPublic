<?php

namespace UserModule\Factories;

use LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory,
    UserModule\Services\UserService,
    DefaultModule\Classes\Functions,
    DefaultModule\Classes\MyMailer,
    Nette\Mail\Message,
    Nette\Application\UI\Presenter,    
    Nette\Security\Passwords;

/**
 * Description of LostPasswordFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LostPasswordFormFactory   {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;
    
    /** @var UserService */
    public $userService;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var MyMailer */
    public $myMailer;
    
    /** @var Presenter */
    public $presenter;
    
    public function __construct(LogService $logService, User $user, UserService $userService, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, MyMailer $myMailer) {
        $this->logService = $logService;
        $this->user = $user;
        $this->userService = $userService;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->myMailer = $myMailer;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addText("mail", "E-mail")
                ->setAttribute("placeholder", "E-mail");

        return $form;
    }

    public function createAddForm($presenter) {

        $this->presenter = $presenter;
        
        $form = $this->getForm();
        $form->addSubmit("submit", "Obnoviť heslo");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);
        
        $user = $this->userService->getOneByEMail($v["mail"]);
        
        if (is_null($user)) {
            $this->presenter->flashMessage("Zadaný e-mail neexistuje. Skúste to prosím znova.", "danger");
            $this->presenter->redrawControl("flashMessages");
        } else {
            
            $newPassword = Functions::generateRandomString(8);
            $hashedNewPassword = Passwords::hash($newPassword);
            
            $user->setPassword($hashedNewPassword);
            $this->userService->update($user);
            
            $message = new Message();
            $message->addTo($v["mail"]);
            $message->setSubject("Zmenené heslo");
            
            $html = "Dobrý deň,<br><br>"
                    . "Vaše heslo bolo zmenené: <strong>".$newPassword."</strong>";
            $message->setHtmlBody($html);
            
            $this->myMailer->send($message);
            
            $this->presenter->flashMessage("Na váš e-mail boli odoslané nové vygenerované heslo", "success");
            $this->presenter->redirect("this");
        }
        
    }

}
