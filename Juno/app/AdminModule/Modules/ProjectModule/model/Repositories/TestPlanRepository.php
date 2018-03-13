<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TestPlan;

/**
 * Description of TestPlanRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $testplanEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->testplanEntity = $em->getRepository(TestPlan::getClassName());
    }

    /**
     * Inserts given entity
     * @param TestPlan $testplan
     */
    public function insert(TestPlan $testplan) {
        $this->em->persist($testplan);
        $this->done();
    }

    /**
     * Updates given entity
     * @param TestPlan $testplan
     */
    public function update(TestPlan $testplan) {
        $this->em->persist($testplan);
        $this->done();
    }

    /**
     * Removes given entity
     * @param TestPlan $testplan
     */
    public function delete(TestPlan $testplan) {
        $this->em->remove($testplan);
        $this->done();
    }

    /**
     * Returns TestPlan entity by given ID
     * @param int $id
     * @return TestPlan
     */
    public function getById($id) {
        $entity = $this->testplanEntity->find($id);

        $this->testplanEntity->getEntityManager()->refresh($entity);

        return $entity;
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplanEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->testplanEntity->createQueryBuilder()
                ->select("tp")
                ->from("ProjectModule\Entities\TestPlan", "tp");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
