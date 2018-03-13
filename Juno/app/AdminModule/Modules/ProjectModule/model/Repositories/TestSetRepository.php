<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TestSet;

/**
 * Description of TestSetRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestSetRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $testsetEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->testsetEntity = $em->getRepository(TestSet::getClassName());
    }

    /**
     * Inserts given entity
     * @param TestSet $testset
     */
    public function insert(TestSet $testset) {
        $this->em->persist($testset);
        $this->done();
    }

    /**
     * Updates given entity
     * @param TestSet $testset
     */
    public function update(TestSet $testset) {
        $this->em->persist($testset);
        $this->done();
    }

    /**
     * Removes given entity
     * @param TestSet $testset
     */
    public function delete(TestSet $testset) {
        $this->em->remove($testset);
        $this->done();
    }

    /**
     * Returns TestSet entity by given ID
     * @param int $id
     * @return TestSet
     */
    public function getById($id) {
        return $this->testsetEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testsetEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->testsetEntity->createQueryBuilder()
                ->select("ts")
                ->from("ProjectModule\Entities\TestSet", "ts");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
