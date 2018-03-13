<?php

namespace MultimediaModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Multimedia_folder extends \DefaultModule\Entities\DefaultEntity {
    
    use \Kdyby\Doctrine\Entities\MagicAccessors;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $datein;
    
    /**
     * @ORM\OneToMany(targetEntity="MultimediaModule\Entities\Multimedia", mappedBy="multimedia_folder", cascade={"remove"})
     */
    protected $multimedias;    
    
    public function getId() {
	return $this->id;
    }

    public function getName() {
	return $this->name;
    }

    public function getDatein() {
	return $this->datein;
    }

    public function getMultimedias() {
	return $this->multimedias;
    }

    public function setId($id) {
	$this->id = $id;
    }

    public function setName($name) {
	$this->name = $name;
    }

    public function setDatein($datein) {
	$this->datein = $datein;
    }

    public function setMultimedias($multimedias) {
	$this->multimedias = $multimedias;
    }




    
}
