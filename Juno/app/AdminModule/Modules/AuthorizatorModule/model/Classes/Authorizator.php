<?php

namespace AuthorizatorModule\Classes;

use Nette\Security\Permission,
    UserModule\Services\User,
    Nette\Database\Context,
    Nette\Caching\Cache,
    Nette\Caching\IStorage;

/* 
 * To change this license header, choose License Headers in Project Properties
 * To change this template file, choose Tools | Templates
 * and open the template in the editor
 */
class Authorizator {
    
    public static $RESOURCE_NAME = "JUNO_APP_AUTHORIZATOR";
    public static $TESTER_ROLE_ID = 3;
    
    /** @var Context */
    public $database;
    
    /** @var Cache */
    public $cache;
    
    /** @var Permission */
    private $permission;
    
    public function __construct(Context $database, IStorage $storage) {
        $this->database = $database;
        $this->cache = new Cache($storage, self::$RESOURCE_NAME); 
    }
    
    /**
     * Setup Authorizator
     * @param User $user
     */
    public function setup(User &$user) {
        $this->preparePermission();
        $this->setUserRoles($user);
        
        $user->setAuthorizator($this->getPermission());
    }
    
    /**
     * This functions prepares permission 
     * It is either a NEW one or used one from cache
     */
    private function preparePermission() {
        
        $cachedPermission = $this->cache->load(self::$RESOURCE_NAME);
        if (is_null($cachedPermission)) {
            $this->regeneratePermission();            
        } else {
            $this->setPermission($cachedPermission);
        }
    }
    
    /**
     * Regenerates permission
     */
    public function regeneratePermission() {
        $this->generateFreshPermission();
        $this->savePermissionToCache();    
    }
    
    /**
     * Generates new Permission
     * @return Permission
     */
    private function generateFreshPermission() {
        
        $permission = new Permission();
        
        $projects = $this->database->table("project")->fetchPairs("id", "name_safe");
        $roles = $this->database->table("role")
                ->where("is_for_project = 1")->fetchPairs("id", "name_safe");

        // This is for all PROJECT in APP
        foreach ($projects as $projectID => $projectNameSafe) {
            // RESOURCE IS PROJECT UNIQUE NAME
            $permission->addResource($projectNameSafe);
            
            foreach ($roles as $roleID => $roleNameSafe) {
                // ROLE IS UNIQUE COMBINATION OF ROLE AND PROJECT
                $uniqueProjectRoleNameSafe = $projectID . "-" . $roleNameSafe;
                $permission->addRole($uniqueProjectRoleNameSafe);
                // PRIVILEGES
                $privileges = $this->database->table("role_privilege")->where("role_id = ?", $roleID)->fetchPairs(null, "privilege_id");
                if (count($privileges) > 0) {
                    $permission->allow($uniqueProjectRoleNameSafe, $projectNameSafe, $privileges);
                }
            }
        }
        // This is for APP EXCEPT PROJECTS
        $webRoles = $this->database->table("role")
            ->where("is_for_project = 0")->fetchPairs("id", "name_safe");
        $permission->addResource(\Privilege::$JUNO_RESOURCE);

        foreach ($webRoles as $roleID => $roleNameSafe) {
            $permission->addRole($roleNameSafe);
            // PRIVILEGES
            $privileges = $this->database->table("role_privilege")->where("role_id = ?", $roleID)->fetchPairs(null, "privilege_id");
            if (count($privileges) > 0) {
                $permission->allow($roleNameSafe, \Privilege::$JUNO_RESOURCE, $privileges);
            }
        }

        // authenticated is user without any role, but logged in
        $permission->addRole("authenticated");
        // thats why we deny everything for him
        $permission->deny(["authenticated"]);
        $this->setPermission($permission);
    }
    
    /** 
     * Save Permission to cache
     */
    private function savePermissionToCache() {
        $this->cache->save(self::$RESOURCE_NAME, $this->permission);
    }
    
    /**
     * We set user roles
     * @param User $user
     */
    private function setUserRoles(User &$user) {
        
        // we can set role only to loggedin user
        if ($user->isLoggedIn()) {
        
            $userRoles = $this->database->query("SELECT pr.project_id, r.name_safe FROM project_role pr "
                    . "inner join role r "
                    . "on r.id = pr.role_id "
                    . "where pr.user_id = ?", $user->getEntity()->getId())->fetchAll();
            $roles = [];
            foreach ($userRoles as $role) {
                $role = $role["project_id"] . "-" . $role['name_safe'];
                $roles[] = $role;
            }

            $webRoles = $this->database->table("user_web_role")
                ->select("user_web_role.role_id AS role_id, role.name_safe AS role_name_safe")
                ->where("user_web_role.user_id = ?", $user->id)
                ->fetchPairs("role_id", "role_name_safe");
            foreach ($webRoles as $webRole) {
                $roles[] = $webRole;
            }

            if (count($roles) > 0) {
                $user->getIdentity()->setRoles($roles);
            } else {
                $user->getIdentity()->setRoles([]);
            }
        }
    }
    
    private function setPermission(Permission $permission) {
        $this->permission = $permission;
    }
    
    private function getPermission() {
        return $this->permission;
    }
    
}