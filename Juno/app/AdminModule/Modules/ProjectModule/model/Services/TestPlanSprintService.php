<?php

namespace ProjectModule\Services;

use Nette,
    ProjectModule\Repositories\TestPlanSprintRepository,
    ProjectModule\Entities\TestPlanSprint;

/**
 * Description of TestPlanSprintService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestPlanSprintService extends Nette\Object {

    /** @var TestPlanSprintRepository */
    private $testplansprintRepository;

    public function __construct(TestPlanSprintRepository $testplansprintRepository) {
        $this->testplansprintRepository = $testplansprintRepository;
    }

    /**
     * Inserts TestPlanSprint entity
     * @param TestPlanSprint $testplansprint
     */
    public function insert(TestPlanSprint $testplansprint) {
        return $this->testplansprintRepository->insert($testplansprint);
    }

    /**
     * Updates TestPlanSprint entity
     * @param TestPlanSprint $testplansprint
     */
    public function update(TestPlanSprint $testplansprint) {
        return $this->testplansprintRepository->update($testplansprint);
    }

    /**
     * Deletes TestPlanSprint entity
     * @param TestPlanSprint $testplansprint
     */
    public function delete(TestPlanSprint $testplansprint) {
        return $this->testplansprintRepository->delete($testplansprint);
    }

    /**
     * Returns TestPlanSprint entity by given ID
     * @param int $id
     * @return TestPlanSprint
     */
    public function getById($id) {
        return $this->testplansprintRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testplansprintRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->testplansprintRepository->getAllAsQB();
    }

    public function getTestPlanSprintForPlanPairs($testPlanId) {
        return $this->testplansprintRepository->getPairs(["testPlanId" => $testPlanId], "name");

    }

}
