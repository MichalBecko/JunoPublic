<?php

namespace ProjectModule\Services;

use Nette,
    ProjectModule\Repositories\ProjectRepository,
    ProjectModule\Entities\Project;

/**
 * Description of ProjectService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectService extends Nette\Object {

    /** @var ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Inserts Project entity
     * @param Project $project
     */
    public function insert(Project $project) {
        return $this->projectRepository->insert($project);
    }

    /**
     * Updates Project entity
     * @param Project $project
     */
    public function update(Project $project) {
        return $this->projectRepository->update($project);
    }

    /**
     * Deletes Project entity
     * @param Project $project
     */
    public function delete(Project $project) {
        return $this->projectRepository->delete($project);
    }

    /**
     * Returns Project entity by given ID
     * @param int $id
     * @return Project
     */
    public function getById($id) {
        return $this->projectRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->projectRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->projectRepository->getAllAsQB();
    }

}
