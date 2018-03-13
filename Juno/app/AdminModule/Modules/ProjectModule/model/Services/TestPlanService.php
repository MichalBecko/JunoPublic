<?php

namespace ProjectModule\Services;

use Nette,
    ProjectModule\Repositories\TestPlanRepository,
    ProjectModule\Entities\TestPlan;

/**
 * Description of TestPlanService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanService extends Nette\Object {

    /** @var TestPlanRepository */
    private $testplanRepository;

    public function __construct(TestPlanRepository $testplanRepository) {
        $this->testplanRepository = $testplanRepository;
    }

    /**
     * Inserts TestPlan entity
     * @param TestPlan $testplan
     */
    public function insert(TestPlan $testplan) {
        return $this->testplanRepository->insert($testplan);
    }

    /**
     * Updates TestPlan entity
     * @param TestPlan $testplan
     */
    public function update(TestPlan $testplan) {
        return $this->testplanRepository->update($testplan);
    }

    /**
     * Deletes TestPlan entity
     * @param TestPlan $testplan
     */
    public function delete(TestPlan $testplan) {
        return $this->testplanRepository->delete($testplan);
    }

    /**
     * Returns TestPlan entity by given ID
     * @param int $id
     * @return TestPlan
     */
    public function getById($id) {
        return $this->testplanRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplanRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->testplanRepository->getAllAsQB();
    }

}
