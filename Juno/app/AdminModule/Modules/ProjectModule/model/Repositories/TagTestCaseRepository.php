<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\TagTestCase;

class TagTestCaseRepository extends Nette\Object {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var EntityRepository
     */
    private $tagTestCaseEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->tagTestCaseEntity = $em->getRepository(TagTestCase::getClassName());
    }

    /**
     * @param int $id
     * @return TagTestCase
     */
    public function getById($id) {
        return $this->tagTestCaseEntity->find($id);
    }

    /**
     * Inserts given entity
     * @param TagTestCase $tagTestCase
     */
    public function insert(TagTestCase $tagTestCase) {
        $this->em->persist($tagTestCase);
        $this->done();
    }

    private function done() {
        $this->em->flush();
    }

}
