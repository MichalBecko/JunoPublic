<?php

namespace ProjectModule\Controls;

use DefaultModule\Services\DirService;
use DefaultModule\Services\SimpleEntityService;
use Nette\Application\UI\Control;
use Nette\Application\UI\Multiplier;
use ProjectModule\Entities\Role;
use ProjectModule\Factories\RoleFormFactory;

/**
 * Description of Settings
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class RoleSettingsControl extends Control {
    
    const NAME = "roleSettings";
    
    /** @var SimpleEntityService */
    public $simpleEntityService;
    
    /** @var DirService */
    public $dirService;
    
    /** @var RoleFormFactory */
    public $roleFormFactory;
    
    public function __construct(SimpleEntityService $simpleEntityService, DirService $dirService, RoleFormFactory $roleFormFactory) {
        $this->simpleEntityService = $simpleEntityService;
        $this->dirService = $dirService;
        $this->roleFormFactory = $roleFormFactory;
    }
    
    public function render() {
    }
    
    public function renderContent() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/settings.latte');
        
        $template->blocksDir = $this->dirService->getBlocksDir();

        $template->projectRoles = $this->simpleEntityService->getRepository(Role::class)->findBy(["isForProject" => 1]);
        $template->webRoles = $this->simpleEntityService->getRepository(Role::class)->findBy(["isForProject" => 0]);

        $template->privilegeMeanings = \Privilege::getPrivilegesMeaning();

        $template->render();
    }
    
    public function renderButtons() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/buttons.latte');
        
        $template->blocksDir = $this->dirService->getBlocksDir();
        
        $template->render();
    }
    
    public function createComponentAddRoleForm() {
        $form = $this->roleFormFactory->createAddForm();
        $form->onSuccess[] = function() {
            $this->presenter->redirect("this");
        };
        return $form;
    }
    
    public function createComponentEditRoleForm() {
        return new Multiplier(function($id) {
            $form = $this->roleFormFactory->createEditForm($id);
            $form->onSuccess[] = function() {
                $this->presenter->redirect("this");
            };
            return $form;
        }); 
    }
    
    public function handleDeleteRole($roleID) {
        
        $role = $this->simpleEntityService->getRepository(Role::class)->findOneBy(["id" => $roleID]);
        $this->simpleEntityService->remove($role);
        
        $this->presenter->redirect(":Admin:Settings:SpecificSettings:default", self::NAME);
    }
    
    public function handleEditRole($roleID) {
        
        $template = $this->template;
        
        $template->isRoleOpened = TRUE;
        $template->role = $this->simpleEntityService->getRepository(Role::class)->findOneBy(["id" => $roleID]);
        
        // MAGIC IMPORTANT
        $this->presenter->template->activeControlName = self::NAME;
        
        $this->presenter->redrawControl("settingsControlContent");
        $this->redrawControl("openedRole");
    }
    
}
