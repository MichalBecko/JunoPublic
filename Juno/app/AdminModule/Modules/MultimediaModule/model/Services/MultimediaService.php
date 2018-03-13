<?php

namespace MultimediaModule\Services;

use Nette,
    MultimediaModule\Repositories\MultimediaRepository,
    MultimediaModule\Entities\Multimedia;

/**
 * Description of Multimedias
 *
 * @author Vladino
 */
class MultimediaService extends Nette\Object {
    
    /**
     * @var MultimediaRepository 
     */
    public $multimediaRepository;
    
    public function __construct(MultimediaRepository $multimediaRepository) {
	$this->multimediaRepository = $multimediaRepository;
    }
    
    public function getAllByMultimedia_folder_id($multimedia_folder_id) {
	return $this->multimediaRepository->getAllByMultimedia_folder_id($multimedia_folder_id);
    }
    
    /**
     * Returns all multimedia entities
     * @return arraz
     */
    public function getAll() {
        return $this->multimediaRepository->getAll();
    }
    
    /**
     * Inserts and immediatelly returns inserted entity
     * @param Multimedia $multimedia
     * @return Multimedia
     */
    public function insert(Multimedia $multimedia) {
	return $this->multimediaRepository->insert($multimedia);
    }
    
    /**
     * Returns Multimedia entity
     * @param int $id
     * @return Multimedia
     */
    public function findById($id) {
	return $this->multimediaRepository->findById($id);
    }
    
    public function getByFileName($fileName) {
        return $this->multimediaRepository->getByFileName($fileName);
    }
    
    /**
     * Deletes given entity
     * @param $multimedia
     */
    public function delete(Multimedia $multimedia) {
	$this->multimediaRepository->delete($multimedia);
    }
    
    public function getCountedSize() {
        
        return $this->multimediaRepository->getCountedSize();
        
    }
    
}
