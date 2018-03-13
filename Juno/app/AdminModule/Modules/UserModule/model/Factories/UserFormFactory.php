<?php

namespace UserModule\Factories;

use DefaultModule\Factories\DynamicFormFactory,
    DefaultModule\Interfaces\IFormFactory,
    Nette\Application\UI\Form,
    LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\UserService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    MultimediaModule\Services\MultimediaService,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    UserModule\Services\ResourceService,
    UserModule\Services\ActionService,
    UserModule\Services\User_resource_actionService,
    UserModule\Entities\User_resource_action,
    UserModule\Entities\User as UserEntity,
    DefaultModule\Classes\Functions,
    DefaultModule\Factories\TranslatedFormFactory,
    Nette\Security\Passwords;
use LogModule\Classes\LogValues;
use Nette\Database\Context;

/**
 * Description of UserFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class UserFormFactory extends DynamicFormFactory implements IFormFactory {

    /** @var LogService */
    public $logService;
    
    /** @var UserService */
    public $userService;
    
    /** @var IMultimediaSaver */
    public $iMultimediaSaver;
    
    /** @var MultimediaService */
    public $multimediaService;
    
    /** @var User */
    public $user;
    
    /** @var HydratorService */
    public $hydratorService;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;

    /** @var Context */
    public $database;

    public function __construct(Context $database, LogService $logService, UserService $userService, IMultimediaSaver $iMultimediaSaver,
            MultimediaService $multimediaService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory) {
        $this->logService = $logService;
        $this->userService = $userService;
        $this->iMultimediaSaver = $iMultimediaSaver;
        $this->multimediaService = $multimediaService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->database = $database;
    }
    
    public function getForm() {

        $webRoles = $this->database->table("role")->where("is_for_project = 0")->fetchPairs("id", "name");
        
        $form = $this->translatedFormFactory->create();
        
        $form->addText("name", "is.user.name")
                ->setRequired("Zadajte meno")
                ->setAttribute("colWidth", "col-md-4");
        $form->addText("surname", "is.user.surname")
                    ->setAttribute("colWidth", "col-md-4");

        $form->addText("eMail", "is.user.eMail")
                    ->setAttribute("colWidth", "col-md-4")
                    ->setAttribute("isNewline", true)
                    ->setRequired("Zadajte e-mail")
                    ->addRule($form::EMAIL, "Zadajte platný e-mail");
        $form->addText("phoneNumber", "is.user.phoneNumber")
                    ->setAttribute("colWidth", "col-md-4");

        $form->addPassword("password", "is.user.password")
                    ->setRequired("Zadajte heslo")
                    ->addRule($form::MIN_LENGTH, "Heslo musí mať minimálne 8 znakov", 8)
                    ->setAttribute("colWidth", "col-md-4")
                    ->setAttribute("isNewline", true);
        $form->addPassword("password_check", "is.user.passwordCheck")
                    ->setAttribute("colWidth", "col-md-4")
                    ->setRequired("Zadajte prosím heslo znova pre kontrolu")
                    ->addRule(Form::EQUAL, "Heslá sa musia zhodovať", $form["password"]);

        $form->addCheckbox("superAdmin", "Super Admin")
            ->setAttribute("colWidth", "col-md-12");

        $form->addCheckboxList("webRoles", "Webové role", $webRoles);
        
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
        
        $user = $this->hydratorService->fromArray($v, new UserEntity(), ["password", "password_check", "webRoles"]);
        
        $user->setPassword(Passwords::hash($user->getPassword(), ["cost" => 10]));
        
        $insertedUser = $this->userService->insert($user);

        foreach ($v["webRoles"] as $webRole) {
            $data = [
                "user_id" => $insertedUser->id,
                "role_id" => $webRole
            ];
            $this->database->table("user_web_role")->insert($data);
        }

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_SETTINGS);
        $log->setDescription("Vytvořil nového uživatele s ID ".$user->getId());
        $this->logService->insert($log);
    }

    public function createEditForm($id) {
        
        $user = $this->userService->getOneById($id);
        
        $unwantedKeys = ["logs", "contacts", "orders", "orderItems", "invoices"];
        $userArray = $user->toArray($unwantedKeys);
        
        $form = $this->getForm();

        // ROLES
        $userRoles = $this->database->table("user_web_role")->where("user_id = ?", $id)->fetchPairs("role_id", "role_id");
        $userArray["webRoles"] = $userRoles;

        $form->setDefaults($userArray);

        // RESOURCES
        /**
         * Very nasty fix of addRule, but it is working
         */
        $form->removeComponent($form["password"]);
        $form->removeComponent($form["password_check"]);
        error_reporting(E_ERROR | E_PARSE);

        $form->addPassword("password", "is.user.password")
                ->setAttribute("colWidth", "col-md-4")
                ->setAttribute("isNewline", true)
                ->setRequired(false)
                ->addRule($form::MIN_LENGTH, "Heslo musí mať minimálne 8 znakov", 8);
        $form->addPassword("password_check", "is.user.passwordCheck")
                ->setAttribute("colWidth", "col-md-4")
                ->addRule(Form::EQUAL, 'Zadané heslá sa musia zhodovať', $form['password']);
        
        $form->addHidden("id", $id);
	    $form->addSubmit("submit", "Upraviť uživateľa");
        $form->onSuccess[] = [$this, "edit"];

        return $form;
    }

    public function edit(Form $form) {
        
        $v = $form->getValues(TRUE);

        if ($v["password"] != "") {
            $v["password"] = Passwords::hash($v["password"], ["cost" => 10]);
        } else {
            unset($v["password"]);
        }

        $userEntity = $this->hydratorService->fromArray($v, $this->userService->getOneById($v["id"]), ["password_check", "webRoles"]);

        $this->userService->update($userEntity);

        $this->database->table("user_web_role")->where("user_id = ?", $userEntity->id)->delete();
        foreach ($v["webRoles"] as $webRole) {
            $data = [
                "user_id" => $userEntity->id,
                "role_id" => $webRole
            ];
            $this->database->table("user_web_role")->insert($data);
        }

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_SETTINGS);
        $log->setDescription("Upravil uživatele s ID ".$userEntity->getId());
        $this->logService->insert($log);
    }

}
