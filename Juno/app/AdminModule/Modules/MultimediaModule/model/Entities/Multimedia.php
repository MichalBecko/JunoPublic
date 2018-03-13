<?php

namespace MultimediaModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class Multimedia extends DefaultEntity
{

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $path;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $multimedia_folder_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia_folder", inversedBy="multimedias")
     */
    protected $multimedia_folder;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $datein;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $size;
    
    public function getId() {
	return $this->id;
    }

    public function getName() {
	return $this->name;
    }

    public function getPath() {
	return $this->path;
    }

    public function getType() {
	return $this->type;
    }

    public function getMultimedia_folder() {
	return $this->multimedia_folder;
    }

    public function getDatein() {
	return $this->datein;
    }

    public function setId($id) {
	$this->id = $id;
    }

    public function setName($name) {
	$this->name = $name;
    }

    public function setPath($path) {
	$this->path = $path;
    }

    public function setType($type) {
	$this->type = $type;
    }

    public function setMultimedia_folder($multimedia_folder) {
	$this->multimedia_folder = $multimedia_folder;
    }

    public function setDatein($datein) {
	$this->datein = $datein;
    }    
    
    public function getSize() {
	return $this->size;
    }
    
    /**
     * Format size of upload into nice and readable format
     * @return string
     */
    public function getFormattedSize() {
	
	    $bytes = $this->getSize();
	
	    if ($bytes >= 1073741824)
	    {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	    }
	    elseif ($bytes >= 1048576)
	    {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	    }
	    elseif ($bytes >= 1024)
	    {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	    }
	    elseif ($bytes > 1)
	    {
		$bytes = $bytes . ' bytes';
	    }
	    elseif ($bytes == 1)
	    {
		$bytes = $bytes . ' byte';
	    }
	    else
	    {
		$bytes = '0 bytes';
	    }

	    return $bytes;
	    
    }
    
    public static function getFormattedSizeBySize($size) {
        $bytes = $size;
	
	    if ($bytes >= 1073741824)
	    {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	    }
	    elseif ($bytes >= 1048576)
	    {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	    }
	    elseif ($bytes >= 1024)
	    {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	    }
	    elseif ($bytes > 1)
	    {
		$bytes = $bytes . ' bytes';
	    }
	    elseif ($bytes == 1)
	    {
		$bytes = $bytes . ' byte';
	    }
	    else
	    {
		$bytes = '0 bytes';
	    }

	    return $bytes;
    }

    public function setSize($size) {
	$this->size = $size;
    }
   
    public function isImage() {
	return in_array($this->getType(), array('image/gif', 'image/png', 'image/jpeg'), TRUE);
    }
    
    /**
     * Returns icon name from given fileType
     * @param string $fileType
     */
    public function getIcon() {
	
	$fileType = $this->getType();
	
	$image = array(
	    'image/gif',
	    'image/png',
	    'image/jpg',
	    'image/jpeg'
	);
	
	$rarZip = array(
	    'application/zip',
            'application/x-rar-compressed'
	);
	
	$audio = array(
	    'audio/mpeg'
	);
	
	$video = array(
	    'video/quicktime',
	    'video/mp4'
	);
	
	$pdf = array(
	    'application/pdf'
	);
	
	$wordExcelPptx = array(
	    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
	    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
	    'application/msword',
	    'application/vnd.ms-excel',
	    'application/vnd.ms-powerpoint'
	);
	
	if (in_array($fileType, $image)) {
	    return "image.png";
	} elseif (in_array($fileType, $audio)) {
	    return "audio.png";
	} elseif (in_array($fileType, $video)) {
	    return "video.png";
	} elseif (in_array($fileType, $rarZip)) {
	    return "rarZip.png";
	} elseif (in_array($fileType, $pdf)) {
	    return "pdf.png";
	} elseif (in_array($fileType, $wordExcelPptx)) {
	    return "wordExcelPptx.png";
	} else {
	    return "default.png";
	}
	
    }
    
}
