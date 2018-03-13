<?php

namespace ProjectModule\Services;

use DefaultModule\Services\SimpleEntityService;
use Nette;
use Nette\Utils\FileSystem;
use ProjectModule\Entities\TestCase;
use ProjectModule\Repositories\TestCaseRepository;

/**
 * Description of TestCaseService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestCaseService extends Nette\Object {

    /** @var TestCaseRepository */
    private $testcaseRepository;
    
    /** @var SimpleEntityService */
    private $simpleEntityService;

    public function __construct(TestCaseRepository $testcaseRepository, SimpleEntityService $simpleEntityService) {
        $this->testcaseRepository = $testcaseRepository;
        $this->simpleEntityService = $simpleEntityService;
    }

    /**
     * Inserts TestCase entity
     * @param TestCase $testcase
     */
    public function insert(TestCase $testcase) {
        return $this->testcaseRepository->insert($testcase);
    }

    /**
     * Updates TestCase entity
     * @param TestCase $testcase
     */
    public function update(TestCase $testcase) {
        return $this->testcaseRepository->update($testcase);
    }

    /**
     * Deletes TestCase entity
     * @param TestCase $testcase
     */
    public function delete(TestCase $testcase) {
        
        foreach ($testcase->multimedias as $mul) {
            FileSystem::delete($mul->getPath());
            $this->simpleEntityService->delete($mul, false);
        }
        
        return $this->testcaseRepository->delete($testcase);
    }

    /**
     * Returns TestCase entity by given ID
     * @param int $id
     * @return TestCase
     */
    public function getById($id) {
        return $this->testcaseRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->testcaseRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->testcaseRepository->getAllAsQB();
    }

}
