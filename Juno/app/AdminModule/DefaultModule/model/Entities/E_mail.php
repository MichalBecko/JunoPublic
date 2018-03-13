<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class E_mail extends DefaultEntity {
    
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
     * Checks if this entity is filled
     * @return boolean
     */
    public function isFilled() {
        if ($this->getName() !== NULL && trim($this->getName()) !== "") {
            return true;
        } else {
            return false;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

}