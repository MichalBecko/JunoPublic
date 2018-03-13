<?php

namespace SettingsModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Settings extends \DefaultModule\Entities\DefaultEntity {
    
    use \Kdyby\Doctrine\Entities\MagicAccessors;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *@ORM\Column(type="string")
     */
    protected $option;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    
    /**
     * @ORM\Column(type="datetime", name="date_update")
     */
    protected $dateUpdate;
    
    /*
     * @ORM\prePersist
     * @ORM\preUpdate
     */
    public function update()
    {
        $this->setDateUpdate(new \DateTime('now'));
    }
    
    public function getId() {
	return $this->id;
    }

    public function getOption() {
	return $this->option;
    }

    public function getDescription() {
	return $this->description;
    }

    public function setOption($option) {
	$this->option = $option;
    }

    public function setDescription($description) {
	$this->description = $description;
    }
    
    function getDateUpdate() {
        return $this->dateUpdate;
    }

    function setDateUpdate($dateUpdate) {
        $this->dateUpdate = $dateUpdate;
    }
    
}
