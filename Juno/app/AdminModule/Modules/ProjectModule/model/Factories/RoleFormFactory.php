<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Interfaces\IFormFactory;
use DefaultModule\Services\HydratorService;
use DefaultModule\Services\SimpleEntityService;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use ProjectModule\Entities\Role;
use UserModule\Services\User;

/**
 * Description of RoleFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class RoleFormFactory implements IFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var SimpleEntityService */
    public $simpleEntityService;
    
    /** @var Context */
    public $database;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, SimpleEntityService $simpleEntityService, Context $database) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->simpleEntityService = $simpleEntityService;
        $this->database = $database;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Názov role");
        $form->addCheckbox("isForProject", "Rola pre projektové role");

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

        $role = new Role();
        $role->setName($v["name"]);
        $role->setIsForProject($v["isForProject"]);

        $this->simpleEntityService->insert($role);
        $this->user->refreshAuthorizator();
    }

    public function createEditForm($id) {

        $defaults = $this->simpleEntityService->getRepository(Role::class)->find($id)->toArray();
        
        $defaults["privileges"] = $this->database->table("role_privilege")->where("role_id = ?", $id)->fetchPairs("privilege_id", "privilege_id");
        
        $form = $this->getForm();
        
        $privileges = $form->addContainer("privileges");
        // if it is JUNO ADMIN
        if ($defaults["isForProject"] == 0) {
            $acceptablePrivileges = \Privilege::getPrivilegesForJunoAdmin();
        } else {
            $acceptablePrivileges = \Privilege::getPrivilegesForProjects();
        }
        foreach ($acceptablePrivileges as $privilegeID => $privilegeName) {
            $privileges->addCheckbox($privilegeID, $privilegeName);
        }

        
        $form->addHidden("id", $id);
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);
        
        $roleID = $v["id"];

        
        // ROLE NAME
        $role = $this->simpleEntityService->getRepository(Role::class)->find($roleID);
        $role->setName($v["name"]);
        
        $this->simpleEntityService->update($role);
        
        // DELETE role privileges
        $this->database->table("role_privilege")->where("role_id = ?", $roleID)->delete();
        // INSERT NEW ROLES
        foreach ($v["privileges"] as $privilegeID => $value) {
            if ($value) {
                $data = [
                    "role_id" => $roleID,
                    "privilege_id" => $privilegeID
                ];
                $this->database->table("role_privilege")->insert($data);
            }
        }
        $this->user->refreshAuthorizator();
    }

}
