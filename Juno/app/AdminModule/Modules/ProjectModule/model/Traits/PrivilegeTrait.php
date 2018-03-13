<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 5.2.2018
 * Time: 17:32
 */

namespace ProjectModule\Traits;

trait PrivilegeTrait {

    public function hasRight($userID, $projectID, $privilegeID) {

        $row = $this->database->table("project_role")
            ->where("user_id = ? AND project_id = ?", $userID, $projectID)
            ->where("role:role_privilege.privilege_id = ?", $privilegeID)
            ->fetch();

        if (!$row) {
            return false;
        } else {
            return true;
        }
    }

}