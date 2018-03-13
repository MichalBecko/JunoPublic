<?php

namespace ProjectModule\Presenters;

/**
 * Description of DashboardPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DashboardPresenter extends ManagementPresenter {
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Dashboard", ":Admin:Project:Dashboard:default", ["projectID" => $this->projectID]);
    }
    
    public function actionDefault($projectid) {
        
    }
    
}
