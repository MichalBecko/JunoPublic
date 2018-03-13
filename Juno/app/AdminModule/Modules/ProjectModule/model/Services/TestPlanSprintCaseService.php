<?php

namespace ProjectModule\Services;

use Nette,
    ProjectModule\Repositories\TestPlanSprintCaseRepository,
    ProjectModule\Entities\TestPlanSprintCase;

/**
 * Description of TestPlanSprintCaseService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintCaseService extends Nette\Object {

    /** @var TestPlanSprintCaseRepository */
    private $testplansprintcaseRepository;

    public function __construct(TestPlanSprintCaseRepository $testplansprintcaseRepository) {
        $this->testplansprintcaseRepository = $testplansprintcaseRepository;
    }

    /**
     * Inserts TestPlanSprintCase entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function insert(TestPlanSprintCase $testplansprintcase) {
        return $this->testplansprintcaseRepository->insert($testplansprintcase);
    }

    /**
     * Updates TestPlanSprintCase entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function update(TestPlanSprintCase $testplansprintcase) {
        return $this->testplansprintcaseRepository->update($testplansprintcase);
    }

    /**
     * Deletes TestPlanSprintCase entity
     * @param TestPlanSprintCase $testplansprintcase
     */
    public function delete(TestPlanSprintCase $testplansprintcase) {
        return $this->testplansprintcaseRepository->delete($testplansprintcase);
    }

    /**
     * Returns TestPlanSprintCase entity by given ID
     * @param int $id
     * @return TestPlanSprintCase
     */
    public function getById($id) {
        return $this->testplansprintcaseRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplansprintcaseRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->testplansprintcaseRepository->getAllAsQB();
    }

}
