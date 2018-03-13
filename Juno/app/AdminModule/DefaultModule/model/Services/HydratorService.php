<?php

namespace DefaultModule\Services;

use Nette,
    DoctrineModule\Stdlib\Hydrator\DoctrineObject as Hydrator,
    Kdyby\Doctrine\EntityManager;

/**
 * Description of HydratorService
 *
 * @author Vladino
 */
class HydratorService extends Nette\Object {
   
    /**
     * @var Hydrator
     */
    public $hydrator;
    
    public function __construct(EntityManager $em) {
        $this->hydrator = new Hydrator($em);
    }
    
    /**
     * Hydrates $data into an entity and returns entity
     */
    public function fromArray($data, $entity, $noFill = array()) {
        
        foreach ($noFill as $param) {
            unset($data[$param]);
        }
        
        $newEntity = $this->hydrator->hydrate($data, $entity);
        
        return $newEntity; 
    }
    
}
