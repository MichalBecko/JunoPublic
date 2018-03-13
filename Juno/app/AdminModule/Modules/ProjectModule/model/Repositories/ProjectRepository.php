<?php

namespace ProjectModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ProjectModule\Entities\Project;

/**
 * Description of ProjectRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $projectEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->projectEntity = $em->getRepository(Project::getClassName());
    }

    /**
     * Inserts given entity
     * @param Project $project
     */
    public function insert(Project $project) {
        $this->em->persist($project);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Project $project
     */
    public function update(Project $project) {
        $this->em->persist($project);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Project $project
     */
    public function delete(Project $project) {
        $this->em->remove($project);
        $this->done();
    }

    /**
     * Returns Project entity by given ID
     * @param int $id
     * @return Project
     */
    public function getById($id) {
        return $this->projectEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->projectEntity->findAll();
    }

    public function getAllAsQB() {
        $result = $this->projectEntity->createQueryBuilder()
                ->select("p")
                ->from("ProjectModule\Entities\Project", "p");

        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}
