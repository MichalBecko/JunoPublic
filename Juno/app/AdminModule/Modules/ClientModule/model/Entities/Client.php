<?php

namespace ClientModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Client extends \DefaultModule\Entities\DefaultEntity {
    
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
    protected $eMail;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $telephoneNumber;
    
    /**
     * @ORM\ManyToOne(targetEntity="DefaultModule\Entities\Address", cascade={"persist"})
     */
    protected $address;
    
    /**
     * @ORM\ManyToOne(targetEntity="DefaultModule\Entities\Billing_address", cascade={"persist"})
     */
    protected $billingAddress;
    
    /**
     * @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist"})
     */
    protected $multimedia;
    
    /**
     * @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist"})
     */
    protected $favicon;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEMail() {
        return $this->eMail;
    }

    public function getTelephoneNumber() {
        return $this->telephoneNumber;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getBillingAddress() {
        return $this->billingAddress;
    }

    public function getMultimedia() {
        return $this->multimedia;
    }

    public function getFavicon() {
        return $this->favicon;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEMail($eMail) {
        $this->eMail = $eMail;
    }

    public function setTelephoneNumber($telephoneNumber) {
        $this->telephoneNumber = $telephoneNumber;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setBillingAddress($billingAddress) {
        $this->billingAddress = $billingAddress;
    }

    public function setMultimedia($multimedia) {
        $this->multimedia = $multimedia;
    }

    public function setFavicon($favicon) {
        $this->favicon = $favicon;
    }
    
}
