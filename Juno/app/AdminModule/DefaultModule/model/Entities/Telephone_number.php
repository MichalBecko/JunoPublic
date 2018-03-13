<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Telephone_number extends \DefaultModule\Entities\DefaultEntity {
    
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
    protected $number;
    
    /**
     * Checks if this entity is filled
     * @return boolean
     */
    public function isFilled() {
        if ($this->getNumber() !== NULL && trim($this->getNumber()) !== "") {
            return true;
        } else {
            return false;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNumber($number) {
        $this->number = $number;
    }
    
}
