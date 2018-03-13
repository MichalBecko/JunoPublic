<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TagTestSet extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestSet", inversedBy="tags") */
    protected $testSet;
    
}
