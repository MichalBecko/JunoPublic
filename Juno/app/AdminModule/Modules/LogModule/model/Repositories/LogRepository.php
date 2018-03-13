<?php

namespace LogModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    LogModule\Entities\Log;

/**
 * Description of LogRepository
 *
 * @author Vladino
 */
class LogRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $logEntity;

    public function __construct(EntityManager $em)
    {
	$this->em = $em;
	$this->logEntity = $em->getRepository(Log::getClassName());
    }
    
    /**
     * Inserts log entity
     * @param Log $log
     */
    public function insert(Log $log) {
	
	$this->em->persist($log);
	$this->done();
	
    }
    
    /**
     * Returns all logs by user_id
     * @param int $user_id
     * @return Log
     */
    public function findAllByUser_idDesc($user_id) {
	
	$criteria = array(
	    "user_id" => $user_id
	);
	
	$orderBy = array(
	    "datein" => "desc"
	);
	
	return $this->logEntity->findBy($criteria, $orderBy);
    }
    
    public function findAll() {
        
        $logs = $this->em->createQueryBuilder()->select("L")->from("LogModule\Entities\Log", "L");
        return $logs;
    }
    
    public function find($id) {
	return $this->logEntity->find($id);
    }
    
    public function findAllByUser($user) {
        
        $logs = $this->em->createQueryBuilder()->select("L")->from("LogModule\Entities\log", "L")
                ->where("L.user = :user")
                ->setParameter("user", $user);
        
        return $logs;
    }
    
    public function done() {
	$this->em->flush();
    }
}
