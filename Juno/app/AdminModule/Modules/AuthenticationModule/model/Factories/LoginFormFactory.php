<?php

namespace AuthenticationModule\Factories;

use Nette,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory,
    Kdyby\Translation\Translator,
    LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\User,
    UserModule\Services\UserService,
    UserModule\Repositories\UserRepository,
    Nette\Security\AuthenticationException;

/**
 * Description of LoginFormFactory
 *
 * @author Vladino
 */
class LoginFormFactory extends Nette\Object {
    
    /** 
     * @var User 
     */
    public $user;
    
    /**
     * @var TranslatedFormFactory
     */
    public $translatedFormFactory;
    
    /**
     * @var Translator
     */
    public $translator;
    
    /**
     * @var LogService 
     */
    public $logService;
    
    
    /**
     * @var UserRepository
     */
    public $userRepository;
    
    /**
     * @var UserService 
     */
    public $userService;
    
    public function __construct(User $user, TranslatedFormFactory $translatedFormFactory, Translator $translator, LogService $logService, UserRepository $userRepository, UserService $userService) {
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->translator = $translator;
        $this->logService = $logService;
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }
    
    /** 
     * Creates loginForm for user
     * @return Form
     */
    public function create() {
	
        $form = $this->translatedFormFactory->create();

        $form->addText("e_mail", "is.login.mail")->setAttribute("placeholder", "E-mail");
        $form->addPassword("password", "is.login.password")->setAttribute("placeholder", "Heslo");
        $form->addCheckbox("remember", "is.login.remember");
        $form->addSubmit("submit", "is.login.submit");

        $form->onSuccess[] = [$this, "login"];

        return $form;
    }

    /** 
     * Login user
     * @param \Nette\Application\UI\Form $form
     */
    public function login(Form $form) {
	
        $v = $form->getValues();

        try {
            if ($v["remember"]) {
                $this->user->setExpiration('14 days', FALSE);
            } else {
                $this->user->setExpiration('1 day', TRUE);
            }

            $this->user->login($v["e_mail"], $v["password"]);
        } catch (AuthenticationException $e) {

            $user = $this->userService->getOneByEMail($v["e_mail"]);

            if ($user != false) {
                // log unsuccesfull login
                $form->addError("is.login.wrongLogin");
            } else {
                // log unsuccesfull login of unidentified user
                $form->addError("is.login.wrongLogin");
            }

        }
	
    }
    
}
