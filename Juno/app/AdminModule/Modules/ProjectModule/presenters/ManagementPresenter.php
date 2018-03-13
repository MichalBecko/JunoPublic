<?php

namespace ProjectModule\Presenters;

use Nette\Security\Permission;
use ProjectModule\Entities\Project;

/**
 * Description of ManagementPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ManagementPresenter extends ProjectPresenter {
    
    /** @persistent */
    public $projectID;
    
    /** @var Project */
    protected $project;
    
    protected $tabName;
    
    public function startup() {
        parent::startup();

        $this->project = $this->projectService->getById($this->projectID);
        $this->template->project = $this->project;
        
        $this->addBreadCrumb("Projekt: " . $this->project->getName(), ":Admin:Project:Dashboard:default", ["projectID" => $this->projectID]);
        $this->setTabName();
    }

    /**
     * This functions checks if current user has certain privilage
     * @param $privilege integer
     * @override functions for whole APP
     */
    public function isAllowed($privilege) {

        if ($this->user->getEntity()->isSuperAdmin()) {
            return true;
        }

        if (parent::isAllowed($privilege)) {
            return true;
        } else {
            return $this->user->isAllowed($this->project->getNameSafe(), $privilege);
        }
    }
    
    public function actionDashboard($projectID) {
        $this->addBreadCrumb("Dashboard", "this");
    }
    
    private function setTabName() {
        $lastOccurence = strrchr($this->getName(), ":");
        $result = substr($lastOccurence, 1);
        $this->tabName = $result;
        $this->template->tabName = $result;
    }
    
}
