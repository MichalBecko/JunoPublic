<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestPlanSprintCase extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanSprint") */
    protected $testPlanSprint;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanCase") */
    protected $testPlanCase;

    /** @ORM\Column(type="integer") */
    protected $statusId;

    /** @ORM\Column(type="integer") */
    protected $forcedStatusId;

}