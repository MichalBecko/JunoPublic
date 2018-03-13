<?php

namespace ProjectModule\Entities;

use DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestPlanSprintCaseUser extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $user;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanSprintCase") */
    protected $testPlanSprintCase;

}
