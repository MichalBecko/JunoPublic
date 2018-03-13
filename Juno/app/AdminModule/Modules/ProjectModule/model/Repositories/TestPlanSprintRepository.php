<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TestPlanSprint;

/**
 * Description of TestPlanSprintRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $testplansprintEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->testplansprintEntity = $em->getRepository(TestPlanSprint::getClassName());
    }

    /**
     * Inserts given entity
     * @param TestPlanSprint $testplansprint
     */
    public function insert(TestPlanSprint $testplansprint) {
        $this->em->persist($testplansprint);
        $this->done();
    }

    /**
     * Updates given entity
     * @param TestPlanSprint $testplansprint
     */
    public function update(TestPlanSprint $testplansprint) {
        $this->em->persist($testplansprint);
        $this->done();
    }

    /**
     * Removes given entity
     * @param TestPlanSprint $testplansprint
     */
    public function delete(TestPlanSprint $testplansprint) {
        $this->em->remove($testplansprint);
        $this->done();
    }

    /**
     * Returns TestPlanSprint entity by given ID
     * @param int $id
     * @return TestPlanSprint
     */
    public function getById($id) {
        return $this->testplansprintEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplansprintEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->testplansprintEntity->createQueryBuilder()
                ->select("x")
                ->from("XModule\Entities\TestPlanSprint", "x");

        return $result;
    }

    public function getPairs($criteria, $value) {
        return $this->testplansprintEntity->findPairs($criteria, $value);
    }

    private function done() {
        $this->em->flush();
    }

}
