<?php

namespace UserModule\Services;

use Functions\Functions;
use Nette;
use UserModule\Entities\User as UserEntity;
use UserModule\Repositories\UserRepository;

/**
 * Description of UserService
 *
 * @author Vladino
 */
class UserService extends Nette\Object {
    
    /**
     * @var UserRepository
     */
    private $userRepository;
    
    public function __construct(UserRepository $userRepository) {
	
	$this->userRepository = $userRepository;
	
    }
    
    /**
     * Returns user entity
     * @param int $id
     * @return UserEntity
     */
    public function getOneById($id) {
	return $this->userRepository->getOneById($id);
    }
    
    /**
     * Returns user entity
     * @param string $e_mail
     * @return UserEntity
     */
    public function getOneByEMail($e_mail) {
	return $this->userRepository->getOneByEMail($e_mail);
    }
    
    /** 
     * Updates given entity
     * @param UserEntity $user
     */
    public function update(UserEntity $user) {
	$this->userRepository->update($user);
    }
    
    /** 
     * Inserts given entity
     * @param UserEntity $user
     */
    public function insert(UserEntity $user) {
	return $this->userRepository->insert($user);
    }
    
    /**
     * Deletes given user entity
     * @param UserEntity $user
     */
    public function delete(UserEntity $user) {
        $this->userRepository->delete($user);
    }
    
    /**
     * Returns array of User entities
     * @return array
     */
    public function getAllDesc() {
	    return $this->userRepository->getAllDesc();
    }
    
    public function getImageConsultantsForStats() {
        return $this->userRepository->getImageConsultantsForStats();
    }
    
    public function getImageConsultants() {
        return $this->userRepository->getImageConsultants();
    }
    
    public function getMostActiveUser() {
        return $this->userRepository->getMostActiveUser();
    }

    public function getAllAsQB() {
        return $this->userRepository->getAllAsQB();
    }
    
    public function getAllUsersInProject($projectID) {
        
        $db = $this->userRepository->getDatabase();
        
        $result = $db->table("project_role")
            ->select("user.id, user.name, user.surname")
            ->where("project_id = ?", $projectID)
            ->fetchAll();
        
        $result = Functions::formatToPairs("id", ["name", "surname"], $result);
        
        return $result;
    }

    public function getAllUserPairs($value) {
        return $this->userRepository->getPairs($value);
    }
    
}
