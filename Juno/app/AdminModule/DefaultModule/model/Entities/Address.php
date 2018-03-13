<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Address extends DefaultEntity {
    
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
    protected $street;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $city;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $psc;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $state;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $type;
    
    /**
     * Checks if this entity is filled by filled street
     * @return boolean
     */
    public function isFilled() {
        if ($this->getStreet() !== NULL && trim($this->getStreet()) !== "") {
            return true;
        } else {
            return false;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPsc() {
        return $this->psc;
    }

    public function getState() {
        return $this->state;
    }

    public function getType() {
        return $this->type;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setPsc($psc) {
        $this->psc = $psc;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setType($type) {
        $this->type = $type;
    }
    
}