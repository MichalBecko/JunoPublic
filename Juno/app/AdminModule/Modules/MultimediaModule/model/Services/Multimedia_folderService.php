<?php

namespace MultimediaModule\Services;

use Nette,
    MultimediaModule\Repositories\Multimedia_folderRepository,
    MultimediaModule\Entities\Multimedia_folder;

/**
 * Description of Multimedia_folderService
 *
 * @author Vladino
 */
class Multimedia_folderService extends Nette\Object {
    
    public $multimedia_folderRepository;
    
    public function __construct(Multimedia_folderRepository $multimedia_folderRepository) {
	$this->multimedia_folderRepository = $multimedia_folderRepository;
    }
    
    /**
     * Inserts MultimediaFolder into database
     * @param Multimedia_folder $multimedia_folder
     */
    public function insert(Multimedia_folder $multimedia_folder) {
	$this->multimedia_folderRepository->insert($multimedia_folder);
    }
    
    /**
     * Deletes given entity
     * @param Multimedia_folder $multimedia_folder
     */
    public function delete(Multimedia_folder $multimedia_folder) {
        $this->multimedia_folderRepository->delete($multimedia_folder);
    }
    
    /**
     * Returns all multimedia folders from database
     * @return array
     */
    public function getAll() {
	return $this->multimedia_folderRepository->getAll();
    }
    
    /**
     * 
     * @param int $id
     * @return Multimedia_folder
     */
    public function findById($id) {
	return $this->multimedia_folderRepository->findById($id);
    }
    
}
