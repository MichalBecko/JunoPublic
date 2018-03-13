<?php

namespace UserModule\Repositories;

use Kdyby\Doctrine\EntityManager;
use Kdyby\Doctrine\EntityRepository;
use Nette;
use UserModule\Entities\User;

/**
 * Description of User
 *
 * @author Vladino
 */
class UserRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $userEntity;
    
    /**
     *
     * @var \Nette\Database\Context
     */
    private $database;

    public function __construct(EntityManager $em, \Nette\Database\Context $context)
    {
	$this->em = $em;
        $this->database = $context;
	$this->userEntity = $em->getRepository(User::getClassName());
    }
    
    /**
     * Returns array of User entities
     * @return array
     */
    public function getAllDesc() {
	
        $orderBy = array(
            "id" => "desc"
        );

        return $this->userEntity->findBy(array(), $orderBy);
    }
    
    public function getDatabase() {
        return $this->database;
    }
    
    /**
     * Returns user entity from database if exist, otherwise returns false
     * @param string $mail
     * @return User
     */
    public function getOneByEMail($e_mail) {
	
	$criteria = array(
	    "eMail" => $e_mail
	);
	
	return $this->userEntity->findOneBy($criteria);
    }
    
    /** 
     * Get user entity by its id
     * @param int $id
     * @return User
     */
    public function getOneById($id) {
	
	$criteria = array(
	    "id" => $id
	);
	
	return $this->userEntity->findOneBy($criteria);
    }
    
    /**
     * Returns user roles
     * @param int $id
     * @return type
     */
    public function getRoles($id) {
        
        $query = $this->em->createQuery("select r from \UserModule\Entities\Role r"
                . " inner join r.users u where u.id = :id")
                ->setParameter("id", $id);        
        return $query->getResult();
        
    }
    
    /**
     * Inserts user entity
     * @param User $user
     */
    public function insert(User $user) {
        $this->em->persist($user);
        $this->done();
        
        return $user;
    }
    
    /**
     * Deletes given user entity
     * @param User $user
     */
    public function delete(User $user) {
        $this->em->remove($user);
        $this->done();
    }
    
    /** 
     * Updates given entity
     * @param User $data
     */
    public function update(User $user) {
	$this->em->persist($user);
	$this->done();
    }
    
    public function getImageConsultants() {
        
        $criteria = [
            "imageConsultant" => 1
        ];
        
        $result = $this->userEntity->findBy($criteria);
        
        return $result;
    }
    
    public function getImageConsultantsForStats() {
        $qb = $this->userEntity->findBy(["imageConsultant" => 1]);
        
        return $qb;
    }
    
    public function getMostActiveUser() {
        $result = $this->userEntity->createQueryBuilder();
        $result = $result->from("UserModule\Entities\User", "u")
                ->select("u, count(l.id) pocetlogov")
                ->leftJoin("u.logs", "l")
                ->orderBy("pocetlogov", "desc")
                ->groupBy("u.id")
                ->getQuery();
        return $result->getResult()[0];
    }

    public function getAllAsQB() {
        $result = $this->userEntity->createQueryBuilder()
            ->select("u")
            ->from("UserModule\Entities\User", "u");

        return $result;
    }
    
    private function done() {
	$this->em->flush();
    }

    public function getPairs($value) {
        $result = $this->userEntity->findPairs($value);

        return $result;
    }
    
}
