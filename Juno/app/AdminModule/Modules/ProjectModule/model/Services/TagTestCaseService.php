<?php

namespace ProjectModule\Services;

use Nette,
    ProjectModule\Repositories\TagTestCaseRepository;
use ProjectModule\Entities\TagTestCase;

class TagTestCaseService extends Nette\Object {

    /** @var TagTestCaseRepository */
    private $tagTestCaseRepository;

    public function __construct(TagTestCaseRepository $tagTestCaseRepository) {
        $this->tagTestCaseRepository = $tagTestCaseRepository;
    }

    /**
     * @param int $id
     * @return TagTestCase
     */
    public function getById($id) {
        return $this->tagTestCaseRepository->getById($id);
    }

    /**
     * Inserts TagTestCase entity
     * @param TagTestCase $tagTestCase
     */
    public function insert(TagTestCase $tagTestCase) {
        return $this->tagTestCaseRepository->insert($tagTestCase);
    }

}
