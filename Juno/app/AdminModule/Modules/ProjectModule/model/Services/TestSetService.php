<?php

namespace ProjectModule\Services;

use Nette;
use ProjectModule\Entities\TestSet;
use ProjectModule\Repositories\TestSetRepository;

/**
 * Description of TestSetService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestSetService extends Nette\Object {

    /** @var TestSetRepository */
    private $testsetRepository;
    
    /** @var TestCaseService */
    private $testCaseService;
    
    public function __construct(TestSetRepository $testsetRepository, TestCaseService $testCaseService) {
        $this->testsetRepository = $testsetRepository;
        $this->testCaseService = $testCaseService;
    }

    /**
     * Inserts TestSet entity
     * @param TestSet $testset
     */
    public function insert(TestSet $testset) {
        return $this->testsetRepository->insert($testset);
    }

    /**
     * Updates TestSet entity
     * @param TestSet $testset
     */
    public function update(TestSet $testset) {
        return $this->testsetRepository->update($testset);
    }

    /**
     * Deletes TestSet entity
     * @param TestSet $testset
     */
    public function delete(TestSet $testset) {
        
        foreach ($testset->getTestCases() as $testCase) {
            $this->testCaseService->delete($testCase);
        }
        
        return $this->testsetRepository->delete($testset);
    }

    /**
     * Returns TestSet entity by given ID
     * @param int $id
     * @return TestSet
     */
    public function getById($id) {
        return $this->testsetRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testsetRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->testsetRepository->getAllAsQB();
    }

}
