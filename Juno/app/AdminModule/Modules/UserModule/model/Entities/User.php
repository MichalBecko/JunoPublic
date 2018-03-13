<?php

namespace UserModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    MultimediaModule\Entities\Multimedia;

/**
 * @ORM\Entity
 */
class User extends \DefaultModule\Entities\DefaultEntity {
    
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
    protected $surname;
    
    /**
     * @ORM\Column(type="string", name="phone_number")
     */
    protected $phoneNumber;
    
    /**
     * @ORM\Column(type="string", name="e_mail")
     */
    protected $eMail;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $superAdmin;

    /**
     * @ORM\Column(type="integer")
     */
    protected $archive;

    /**
     * @ORM\OneToMany(targetEntity="ProjectModule\Entities\Project", mappedBy="creator")
     */
    protected $projects;

    /**
     * @ORM\OneToMany(targetEntity="ProjectModule\Entities\Issue", mappedBy="creator")
     * @ORM\OrderBy({"priorityId" = "ASC"})
     */
    protected $issues;

    public function isSuperAdmin() {
        if ($this->superAdmin == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function setRoles($roles) {
        $this->roles = $roles;
    }    
    
    public function getUniqueRoleName() {
        $uniqueRoleName = $this->getId() . " - " . $this->getName() . " - " . $this->getSurname();
        return $uniqueRoleName;
    }
    
    public function getFullName() {
        return $this->getName() . " " . $this->getSurname();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    public function getOrderItems() {
        return $this->orderItems;
    }

    public function setOrderItems($orderItems) {
        $this->orderItems = $orderItems;
    }

        public function getSurname() {
        return $this->surname;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getEMail() {
        return $this->eMail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function setEMail($eMail) {
        $this->eMail = $eMail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getContacts() {
        return $this->contacts;
    }

    public function getOrders() {
        return $this->orders;
    }

    public function setContacts($contacts) {
        $this->contacts = $contacts;
    }

    public function setOrders($orders) {
        $this->orders = $orders;
    }

    public function getProjects() {
        return $this->projects;
    }

    public function getIssues() {
        return $this->issues;
    }
    
}
