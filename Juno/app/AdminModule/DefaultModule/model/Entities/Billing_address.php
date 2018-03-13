<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Billing_address extends DefaultEntity {
    
    use \Kdyby\Doctrine\Entities\MagicAccessors;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(name="company_name", type="string")
     */
    protected $companyName;
    
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
    protected $ico;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $dic;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $icdph;
    
    /**
     * Checks if this entity is filled by filled company name
     * @return boolean
     */
    public function isFilled() {
        if ($this->getCompanyName() !== NULL && trim($this->getCompanyName()) !== "") {
            return true;
        } else {
            return false;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCompanyName() {
        return $this->companyName;
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

    public function getIco() {
        return $this->ico;
    }

    public function getDic() {
        return $this->dic;
    }

    public function getIcdph() {
        return $this->icdph;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
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

    public function setIco($ico) {
        $this->ico = $ico;
    }

    public function setDic($dic) {
        $this->dic = $dic;
    }

    public function setIcdph($icdph) {
        $this->icdph = $icdph;
    }
    
}