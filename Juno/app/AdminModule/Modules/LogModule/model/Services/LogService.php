<?php

namespace LogModule\Services;

use Nette,
    LogModule\Repositories\LogRepository,
    Nette\Http\Request,
    LogModule\Entities\Log,
    Kdyby\Doctrine\QueryBuilder,
    Kdyby\Doctrine\ResultSet;
use UserModule\Services\User;

/**
 * Description of LogService
 *
 * @author Vladino
 */
class LogService extends Nette\Object {
   
    /** @var LogRepository */
    public $logRepository;
    
    /** @var Request */
    public $request;

    /** @var User */
    public $user;
    
    public function __construct(LogRepository $logRepository, Request $request, User $user) {
        $this->logRepository = $logRepository;
        $this->request = $request;
        $this->user = $user;
    }
    
    public function insert(Log $log) {

        /** @var  ip */
        $log->ip = $this->request->getRemoteAddress();
        /** @var  creator */
        $log->creator = $this->user->getEntity();

        $this->logRepository->insert($log);
    }
    
    /**
     * Returns all logs as QueryBuilder
     * @return QueryBuilder
     */
    private function getAllLogs() {
        return $this->logRepository->findAll();
    }
    
    public function getAllAsQb() {
        return $this->logRepository->findAll();
    }
    
    public function findAllByUser_id($user_id) {
	    return $this->logRepository->findAllByUser_idDesc($user_id);
    }
    
    public function findAllDesc() {
        
        $logs = $this->getAllLogs();
        $logs->addOrderBy("L.datein", "desc");
        
        return new ResultSet($logs->getQuery());
    }
    
    public function findAllDescByUser($user) {
        
        $logs = $this->logRepository->findAllByUser($user);
        $logs->addOrderBy("L.datein", "desc");
        
        return new ResultSet($logs->getQuery());
    }
    
}
