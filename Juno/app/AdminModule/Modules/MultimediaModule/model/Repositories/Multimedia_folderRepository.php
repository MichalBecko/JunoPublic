<?php

namespace MultimediaModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    MultimediaModule\Entities\Multimedia_folder;

/**
 * Description of Multimedia_folderRepository
 *
 * @author Vladino
 */
class Multimedia_folderRepository extends Nette\Object {
    
    /**
     * 
     * @var EntityManager 
     */
    private $em;
    
    /**
     *
     * @var EntityRepository 
     */
    private $multimedia_folderEntity;

    public function __construct(EntityManager $em)
    {
	$this->em = $em;
	$this->multimedia_folderEntity = $em->getRepository(Multimedia_folder::getClassName());
    }
    
    /**
     * Inserts given entity
     * @param Multimedia_folder $multimedia_folder
     */
    public function insert(Multimedia_folder $multimedia_folder) {
	$this->em->persist($multimedia_folder);
	$this->done();
    }
    
    /**
     * Removes given entity
     * @param Multimedia_folder $multimedia_folder
     */
    public function delete(Multimedia_folder $multimedia_folder) {
        $this->em->remove($multimedia_folder);
        $this->done();
    }
    
    /**
     * Returns all entities 
     * @return type
     */
    public function getAll() {
	return $this->multimedia_folderEntity->findBy([], ["name" => "asc"]);
    }
    
    /**
     * 
     * @param int $id
     * @return Multimedia_folder
     */
    public function findById($id) {
	return $this->multimedia_folderEntity->find($id);
    }
    
    /**
     * Performs made actions
     */
    protected function done() {
	$this->em->flush();
    }
}
