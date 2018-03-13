<?php

namespace UserModule\Services;

use AuthorizatorModule\Classes\Authorizator;
use Nette;
use UserModule\Entities\User as UserEntity;
use UserModule\Services\ResourceService;
use UserModule\Services\User_resource_actionService;

/**
 * Description of User
 *
 * @author Vladino
 */
class User extends Nette\Security\User {
    
    /** @var UserService */
    public $userService;
    
    /** @var Authorizator */
    public $authorizator;
    
    public function __construct(UserService $userService, Authorizator $authorizatoralt, Nette\Security\IUserStorage $storage, \Nette\Security\IAuthenticator $authenticator = NULL,\Nette\Security\IAuthorizator $authorizator = NULL) {
	parent::__construct($storage, $authenticator, $authorizator);
	    $this->userService = $userService;
        $this->authorizator = $authorizatoralt;
    }

    public function setupACL() {
        $this->authorizator->setup($this);
    } 
    
    public function refreshAuthorizator() {
        $this->authorizator->regeneratePermission();
    }

    /**
     * This enables US to login without any authorization
     * @param $userID
     */
    public function loginWithoutAuthorization($userID) {
        $this->logout(TRUE);
        
        $identity = $this->getAuthenticator()->authenticateWithoutLogin($userID);
        
        $this->getStorage()->setIdentity($identity);
        $this->getStorage()->setAuthenticated(TRUE);
    }
    
    /**
     * Returns user entity and with entity we should handle everything else
     * It is critical to use this method for getting user data because it
     * goes into database and give us fresh data
     * @return UserEntity
     */
    public function getEntity() {
        return $this->userService->getOneById($this->getId());
    }
    
}
