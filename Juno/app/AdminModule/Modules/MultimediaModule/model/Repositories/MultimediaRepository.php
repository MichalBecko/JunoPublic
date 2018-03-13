<?php

namespace MultimediaModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    MultimediaModule\Entities\Multimedia;

/**
 * Description of MultimediaRepository
 *
 * @author Vladino
 */
class MultimediaRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $multimediaEntity;

    public function __construct(EntityManager $em)
    {
	$this->em = $em;
	$this->multimediaEntity = $em->getRepository(Multimedia::getClassName());
    }
    
    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->multimediaEntity->findAll();
    }
    
    /**
     * Inserts and immediatelly returns inserted entity
     * @param Multimedia $multimedia
     * @return Multimedia
     */
    public function insert(Multimedia $multimedia) {
	
	$this->em->persist($multimedia);
	$this->done();
	
	return $multimedia;
	
    }
    
    /**
     * Updates given entity
     * @param Multimedia $multimedia
     */
    public function update(Multimedia $multimedia) {
	
	$this->em->persist($multimedia);
	$this->done();
	
    }
    
    /**
     * Deletes given entity
     * @param Multimedia $multimedia
     */
    public function delete(Multimedia $multimedia) {
	
	$this->em->remove($multimedia);
	$this->done();
    }
    
    public function findById($id) {
	return $this->multimediaEntity->find($id);
    }
    
    public function getAllByMultimedia_folder_id($multimedia_folder_id) {
	
	$criteria = array(
	    "multimedia_folder_id" => $multimedia_folder_id
	);
	
	return $this->multimediaEntity->findBy($criteria);
    }
    
    public function getFetchPairedNames() {
	return $this->multimediaEntity->findPairs(array(), "name");
    }
    
    public function getCountedSize() {
        
        $query = $this->em->createQuery("select sum(m.size) from \MultimediaModule\Entities\Multimedia m")->getSingleScalarResult();
        
        return $query;
        
    }
    
    public function getByFileName($fileName) {
        
        $criteria = [
            "path" => $fileName
        ];
        
        $multimedia = $this->multimediaEntity->findOneBy($criteria);
        
        return $multimedia;
    }
    
    public function done() {
	$this->em->flush();
    }
    
}
