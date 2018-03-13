<?php

namespace ProjectModule\Presenters;

use Nette\Application\UI\Presenter;
use Nette\Database\Context;

/**
 * Description of RestSettingsPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class RestSettingsPresenter extends Presenter {
    
    /** @var Context @inject */
    public $database;
    
    /**
     * This function adds user to certain role in project
     * @param type $userID
     * @param type $projectID
     * @param type $roleID
     * IMPORTANT! Maybe here we should also check if same data doesnt already exist
     */
    public function actionAddUserProjectRole($userID, $roleID, $projectID) {
        
        $data = [
            "user_id" => $userID,
            "project_id" => $projectID,
            "role_id" => $roleID
        ];
        $this->database->table("project_role")->insert($data);

        $this->payload->code = 1;
        $this->sendPayload();
    }

    
    /**
     * Remove user from certain role from certain project
     * @param type $userID
     * @param type $roleID
     */
    public function actionRemoveUserProjectRole($userID, $roleID, $projectID) {
        
        $data = [
            "user_id" => $userID,
            "project_id" => $projectID,
            "role_id" => $roleID
        ];
        $this->database->table("project_role")->where($data)->delete();
        
        $this->payload->code = 1;
        $this->sendPayload();
    }
    
}
