<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TestCase;

/**
 * Description of TestCaseRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestCaseRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $testcaseEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->testcaseEntity = $em->getRepository(TestCase::getClassName());
    }

    /**
     * Inserts given entity
     * @param TestCase $testcase
     */
    public function insert(TestCase $testcase) {
        $this->em->persist($testcase);
        $this->done();
    }

    /**
     * Updates given entity
     * @param TestCase $testcase
     */
    public function update(TestCase $testcase) {
        $this->em->persist($testcase);
        $this->done();
    }

    /**
     * Removes given entity
     * @param TestCase $testcase
     */
    public function delete($testcase) {
        $this->em->remove($testcase);
        $this->done();
    }

    /**
     * Returns TestCase entity by given ID
     * @param int $id
     * @return TestCase
     */
    public function getById($id) {
        return $this->testcaseEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testcaseEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->testcaseEntity->createQueryBuilder()
                ->select("tc")
                ->from("ProjectModule\Entities\TestCase", "tc");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
