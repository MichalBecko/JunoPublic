<?php

namespace ProfileModule\Factories;

use Nette,
    DefaultModule\Factories\TranslatedFormFactory,
    Kdyby\Translation\Translator,
    LogModule\Services\LogService,
    UserModule\Services\UserService,
    MultimediaModule\Services\MultimediaService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    Nette\Application\UI\Form,
    LogModule\Entities\Log,
    Nette\Security\Passwords;

/**
 * Description of UpdateProfileFormFactory
 *
 * @author Vladino
 */
class UpdateProfileFormFactory extends Nette\Object {
    
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
     * @var UserService
     */
    public $userService;
    
    /**
     * @var MultimediaService
     */
    public $multimediaService;
    
    /**
     * @var IMultimediaSaver
     */
    public $iMultimediaSaver;
    
    /**
     * @var User
     */
    public $user;
    
    /**
     *  @var HydratorService
     */
    public $hydratorService;
    
    public function __construct(TranslatedFormFactory $translatedFormFactory, Translator $translator, LogService $logService, UserService $userService, MultimediaService $multimediaService, IMultimediaSaver $iMultimediaSaver, User $user, HydratorService $hydratorService) {
        $this->translatedFormFactory = $translatedFormFactory;
        $this->translator = $translator;
        $this->logService = $logService;
        $this->userService = $userService;
        $this->multimediaService = $multimediaService;
        $this->iMultimediaSaver = $iMultimediaSaver;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
    }
        
   public function create() {
       
        $user = $this->userService->getOneById($this->user->getId());
        
        $form = $this->translatedFormFactory->create();

        $form->addText("name", "is.profile.name")
                    ->setDefaultValue($user->getName());
        $form->addText("surname", "is.profile.surname")
                    ->setAttribute("placeholder", "is.registrationForm.surname")
                    ->setDefaultValue($user->getSurname());

        $form->addText("phoneNumber", "is.default.phoneNumber")
                    ->setDefaultValue($user->getPhoneNumber());
        $form->addText("eMail", "is.default.mail")
                    ->setDefaultValue($user->getEMail());

       error_reporting(E_ERROR | E_PARSE);
       $form->addPassword("password", "is.user.password")
           ->setAttribute("colWidth", "col-md-4")
           ->setAttribute("isNewline", true)
           ->setRequired(false)
           ->addRule($form::MIN_LENGTH, "Heslo musí mať minimálne 8 znakov", 8);
       $form->addPassword("password_check", "is.user.passwordCheck")
           ->setAttribute("colWidth", "col-md-4")
           ->addRule(Form::EQUAL, 'Zadané heslá sa musia zhodovať', $form['password']);

        $form->addSubmit("submit", "is.default.edit");

        $form->onSuccess[] = [$this, "updateProfile"];

        return $form;
   }
    
   public function updateProfile(Form $form) {
	
        $v = $form->getValues(TRUE);

        // changing of profile
        if ($v["password"] != "") {
            $v["password"] = Passwords::hash($v["password"], ["cost" => 10]);
        } else {
            unset($v["password"]);
        }
        unset($v["eMail"]);
        unset($v["password_check"]);

        $user = $this->hydratorService->fromArray($v, $this->user->getEntity());

        $this->userService->update($user);
   }
   
}
