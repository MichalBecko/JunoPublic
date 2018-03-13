<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\ProjectRole;

/**
 * Description of ProjectRoleRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectRoleRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $projectroleEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->projectroleEntity = $em->getRepository(ProjectRole::getClassName());
    }

    /**
     * Inserts given entity
     * @param ProjectRole $projectrole
     */
    public function insert(ProjectRole $projectrole) {
        $this->em->persist($projectrole);
        $this->done();
    }

    /**
     * Updates given entity
     * @param ProjectRole $projectrole
     */
    public function update(ProjectRole $projectrole) {
        $this->em->persist($projectrole);
        $this->done();
    }

    /**
     * Removes given entity
     * @param ProjectRole $projectrole
     */
    public function delete(ProjectRole $projectrole) {
        $this->em->remove($projectrole);
        $this->done();
    }

    /**
     * Returns ProjectRole entity by given ID
     * @param int $id
     * @return ProjectRole
     */
    public function getById($id) {
        return $this->projectroleEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->projectroleEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->projectroleEntity->createQueryBuilder()
                ->select("pr")
                ->from("ProjectModule\Entities\ProjectRole", "pr");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
