<?php

namespace ProjectModule\Services;

use AuthorizatorModule\Classes\Authorizator;
use Nette;
use ProjectModule\Entities\Project;
use ProjectModule\Entities\ProjectRole;
use ProjectModule\Repositories\ProjectRoleRepository;

/**
 * Description of ProjectRoleService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectRoleService extends Nette\Object {

    /** @var ProjectRoleRepository */
    private $projectroleRepository;

    public function __construct(ProjectRoleRepository $projectroleRepository) {
        $this->projectroleRepository = $projectroleRepository;
    }

    /**
     * Inserts ProjectRole entity
     * @param ProjectRole $projectrole
     */
    public function insert(ProjectRole $projectrole) {
        return $this->projectroleRepository->insert($projectrole);
    }

    /**
     * Updates ProjectRole entity
     * @param ProjectRole $projectrole
     */
    public function update(ProjectRole $projectrole) {
        return $this->projectroleRepository->update($projectrole);
    }

    /**
     * Deletes ProjectRole entity
     * @param ProjectRole $projectrole
     */
    public function delete(ProjectRole $projectrole) {
        return $this->projectroleRepository->delete($projectrole);
    }

    /**
     * Returns ProjectRole entity by given ID
     * @param int $id
     * @return ProjectRole
     */
    public function getById($id) {
        return $this->projectroleRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->projectroleRepository->getAll();
    }

    /**
     * Returns all entities in prepared Query builder
     * @return array
     */
    public function getAllAsQB() {
        return $this->projectroleRepository->getAllAsQB();
    }
    
    public function getProjectTesters(Project $project) {
        return $this->getAllAsQB()
            ->select("pr")
            ->innerJoin("pr.user", "u")
            ->andWhere("pr.project = :project")
            ->andWhere("pr.roleID = :roleID")
            ->setParameter("project", $project)
            ->setParameter("roleID", Authorizator::$TESTER_ROLE_ID)
            ->getQuery()
            ->getResult();
    }

}
