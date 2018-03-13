<?php

namespace ProjectModule\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class Issue extends DefaultEntity {

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
    protected $description;

    /** @ORM\Column(type="integer") */
    protected $assigned_id;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Project") */
    protected $project;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanSprint") */
    protected $testPlanSprint;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlanSprintCase") */
    protected $testPlanSprintCase;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestStep") */
    protected $testStep;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestStepExecution") */
    protected $testStepExecution;

    /** @ORM\Column(type="integer") */
    protected $issueTypeId;

    /** @ORM\Column(type="integer") */
    protected $priorityId;

    /** @ORM\Column(type="integer") */
    protected $status;

    /** @ORM\Column(type="datetime") */
    protected $createDate;

    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;

    /** @ORM\ManyToMany(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist"}) */
    protected $multimedias;

    public function __construct() {
        $this->multimedias = new ArrayCollection();
    }

}
