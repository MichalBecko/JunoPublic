<?php

namespace MultimediaModule\Services;

use Nette,
    Nette\Utils\Image,
    Nette\Http\FileUpload,
    MultimediaModule\Repositories\MultimediaRepository,
    DefaultModule\Services\DirService,
    MultimediaModule\Entities\Multimedia;

/**
 * Description of MultimediaSaver
 *
 * @author Vladino
 */
class MultimediaSaver extends Nette\Object {
    
    /**
     * @var FileUpload 
     */
    public $fileUpload;
    
    /**
     * @var MultimediaRepository 
     */
    public $multimediaRepository;
    
    /**
     * @var DirService 
     */
    public $dirService;
    
    public function __construct(FileUpload $fileUpload, MultimediaRepository $multimediaRepository, DirService $dirService) {
        $this->fileUpload = $fileUpload;
        $this->multimediaRepository = $multimediaRepository;
        $this->dirService = $dirService;
    }
    
    public static function manualStart($fileUpload, MultimediaRepository $multimediaRepository, DirService $dirService) {
        $self = new self(new FileUpload("dump.png"), $multimediaRepository, $dirService);
        $self->fileUpload = $fileUpload;
        return $self;
    }
    
    /**
     * Save fileUpload as image and returns Multimedia entity
     * @param string $path like "something/something2/"
     * @param string $x
     * @param string $y
     * @param string $newName
     * @param string $params
     * @return Multimedia
     */
    public function saveAsImage($path, $x = "100%", $y = "100%", $newName = NULL, $params = NULL) {
	    
	$image = Image::fromFile($this->fileUpload);

	$image->resize($x, $y, $params);

	if ($newName === NULL) {
	    $newName = $this->checkOriginalityOfName();
	}
	$imageWithPath = $path . $newName;
	
	$image->save($imageWithPath, 90, Image::PNG);
	
	$multimedia = new Multimedia;
	$multimedia->setName($newName);
//	$multimedia->setType($this->fileUpload->getContentType());
	$multimedia->setSize($this->fileUpload->getSize());
	$multimedia->setPath($imageWithPath);
	$multimedia->setDatein(new \DateTime);
	
	return $multimedia;
    }
    
    /**
     * Save fileUpload as file and returns Multimedia entity
     * @param string $path
     * @param string $newName
     * @return Multimedia
     */
    public function saveAsFile($path, $newName = NULL) {
	
	if ($newName === NULL) {
	    $newName = $this->checkOriginalityOfName();
	} 
	
	$fileWithPath = $path . $newName;
	
	$this->fileUpload->move($fileWithPath);
        
	$multimedia = new Multimedia;
    $multimedia->setName($newName);
//	$multimedia->setType($this->fileUpload->getContentType());
	$multimedia->setSize($this->fileUpload->getSize());
	$multimedia->setPath($fileWithPath);
	$multimedia->setDatein(new \DateTime);
	
	return $multimedia;
	
    }
    
    /**
     * Checks if name of image is original, if not it will make it original
     * @return string $name
     */
    public function checkOriginalityOfName() {
	
	$multimediaNames = $this->multimediaRepository->getFetchPairedNames();
	$i = 1;

	$name = $this->fileUpload->getSanitizedName();
	
	while (in_array($name, $multimediaNames)) {
	    $name = $i.$name;
	    $i++;
	}
	
	return $name;
	
    }
    
   /**
    * Is image type GIF, PNG or JPEG?
    * @return bool
    */
    public function isImage() {
         return in_array($this->fileUpload->getContentType(), array('image/gif', 'image/png', 'image/jpeg'), TRUE);
    }
    
}
