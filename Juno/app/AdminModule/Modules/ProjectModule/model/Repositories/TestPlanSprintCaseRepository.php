<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TestPlanSprintCase;

/**
 * Description of TestPlanSprintCaseRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintCaseRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $testplansprintcaseEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->testplansprintcaseEntity = $em->getRepository(TestPlanSprintCase::getClassName());
    }

    /**
     * Inserts given entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function insert(TestPlanSprintCase $testplansprintcase) {
        $this->em->persist($testplansprintcase);
        $this->done();
    }

    /**
     * Updates given entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function update(TestPlanSprintCase $testplansprintcase) {
        $this->em->persist($testplansprintcase);
        $this->done();
    }

    /**
     * Removes given entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function delete(TestPlanSprintCase $testplansprintcase) {
        $this->em->remove($testplansprintcase);
        $this->done();
    }

    /**
     * Returns TestPlanSprintCase entity by given ID
     * @param int $id
     * @return TestPlanSprintCase
     */
    public function getById($id) {
        return $this->testplansprintcaseEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplansprintcaseEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->testplansprintcaseEntity->createQueryBuilder()
                ->select("tpsc")
                ->from("ProjectModule\Entities\TestPlanSprintCase", "tpsc");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
