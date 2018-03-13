<?php

namespace DefaultModule\Services;

use Nette,
    Kdyby\Doctrine\EntityManager;

/**
 * Description of SimpleEntityService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SimpleEntityService extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * Inserts given entity
     * @param $simpleentityservice
     */
    public function insert($simpleentityservice) {
        $this->em->persist($simpleentityservice);
        $this->done();
    }

    /**
     * Updates given entity
     * @param $simpleentityservice
     */
    public function update($simpleentityservice) {
        $this->em->persist($simpleentityservice);
        $this->done();
    }

    /**
     * Removes given entity
     * @param  $simpleentityservice
     */
    public function delete($simpleentityservice, $callDone = TRUE) {
        $this->em->remove($simpleentityservice);
        if ($callDone) {
            $this->done();
        }
    }

    public function getRepository($entityName) {
        return $this->em->getRepository($entityName);
    }
    
    public function remove($entity) {
        $this->em->remove($entity);
        $this->done();
    }

    public function getEm() {
        return $this->em;
    }
    
    private function done() {
        $this->em->flush();
    }

}
