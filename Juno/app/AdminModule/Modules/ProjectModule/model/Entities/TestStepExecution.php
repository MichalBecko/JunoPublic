<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestStepExecution extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanSprintCase") */
    protected $testPlanSprintCase;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestStep") */
    protected $testStep;

    /** @ORM\Column(type="integer") */
    protected $statusId;

    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;

    /** @ORM\Column(type="datetime") */
    protected $createDate;

}
