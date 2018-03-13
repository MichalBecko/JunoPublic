<?php

namespace ProjectModule\Presenters;

use DefaultModule\Services\SimpleEntityService;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use Nette\Database\Context;
use ProjectModule\Entities\Role;
use ProjectModule\Factories\ProjectFormFactory;

/**
 * Description of SettingsPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SettingsPresenter extends ManagementPresenter {
    
    /** @var SimpleEntityService @inject */
    public $simpleEntityService;
    
    /** @var Context @inject */
    public $database;
    
    /** @var ProjectFormFactory @inject */
    public $projectFormFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Settings", ":Admin:Project:Settings:default", ["projectID" => $this->projectID]);
    }
    
    public function actionDefault($projectid) {
        
        $roles = $this->simpleEntityService->getRepository(Role::class)->findBy(["isForProject" => 1]);
        $this->template->roles = $roles;
        
        $users = $this->userService->getAllDesc();
        $this->template->users = $users;

        $projectRoles = $this->database->table("project_role")
                ->select("project_role.user_id, project_role.role_id, user.name, user.surname")
                ->where("project_role.project_id = ?", $this->projectID)
                ->fetchAll();
        $this->toNiceProjectRoles($projectRoles);
        $this->template->projectRoles = $projectRoles;
    }
    
    public function createComponentDeleteProjectForm() {
        $form = $this->projectFormFactory->createDeleteForm($this->project);
        $form->onSuccess[] = function() {

            $this->flashMessage("Projekt bol úspešne zmazaný", "success");
            $this->redirect(":Admin:Project:Project:");
        };
        return $form;
    }
    
    public function createComponentEditProjectForm() {
        
        $form = $this->projectFormFactory->createEditForm($this->project);
        $form->onSuccess[] = function() {
            $this->flashMessage("Projekt bol úspešne upravený", "success");
            $this->redirect(":Admin:Project:Settings:#vseobecne-nastavenia");
        };
        
        return $form;
    }
    
    private function toNiceProjectRoles(&$projectRoles) {
        $arr = [];
        foreach ($projectRoles as $pR) {
            $arr[] = $pR->toArray();
        }
        $projectRoles = $arr;
    }
    
}
