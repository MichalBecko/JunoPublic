<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestPlanCase extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlan") */
    protected $testPlan;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestCase") */
    protected $testCase;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestPlanSprintCase", mappedBy="testPlanCase") */
    protected $testPlanSprintCase;

}
