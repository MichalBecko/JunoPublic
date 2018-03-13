<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity,
    Nette\Utils\Strings;

/**
 * @ORM\Entity
 */
class Role extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\Column(type="string") */
    protected $nameSafe;

    /** @ORM\Column(type="integer") */
    protected $isForProject;

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
        $this->nameSafe = Strings::webalize($name);
    }
    
}
