<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestStep extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $precondition;
    
    /** @ORM\Column(type="string") */
    protected $expectedResult;
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="datetime") */
    protected $createDate;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestCase") */
    protected $testCase;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestStepExecution", mappedBy="testStep") */
    protected $testStepExecutions;

}
