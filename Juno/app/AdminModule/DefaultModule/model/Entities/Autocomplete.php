<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class Autocomplete extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $elementId;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $value;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $sort;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $status;
    
    public function getId() {
        return $this->id;
    }

    public function getElementId() {
        return $this->elementId;
    }

    public function getValue() {
        return $this->value;
    }

    public function getSort() {
        return $this->sort;
    }

    public function getStatus() {
        return $this->status;
    }



}
