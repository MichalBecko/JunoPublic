<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class Currency extends DefaultEntity {

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
    protected $title;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $unit;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $status;
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getUnit() {
        return $this->unit;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setUnit($unit) {
        $this->unit = $unit;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
