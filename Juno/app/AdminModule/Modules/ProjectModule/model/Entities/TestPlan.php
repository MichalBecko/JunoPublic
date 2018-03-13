<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TestPlan extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Project") */
    protected $project;
    
    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestPlanSprint", mappedBy="testPlan") */
    protected $testPlanSprints;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestPlanCase", mappedBy="testPlan")  */
    protected $testPlanCases;
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="string") */
    protected $createDate;
    
    public function getTestPlanSprints() {
        return $this->testPlanSprints;
    }

    public function getTestPlanCases() {
        return $this->testPlanCases;
    }

    public function hasChildren(){
        
        if (count($this->testPlanSprints) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
