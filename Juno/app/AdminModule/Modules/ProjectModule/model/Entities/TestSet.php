<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class TestSet extends DefaultEntity {

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
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="datetime") */
    protected $createDate;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Project") */
    protected $project;
    
    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestCase", mappedBy="testSet", cascade={"persist"}, orphanRemoval=true) */
    protected $testCases;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TagTestSet", mappedBy="testSet", cascade={"persist"}, orphanRemoval=true) */
    protected $tags;

    public function __construct() {
        $this->testCases = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getTags($asArray = false) {
        if ($asArray) {
            $tags = [];
            foreach ($this->tags as $tag) {
                $tags[$tag->id] = $tag->name;
            }

            return $tags;
        } else {
            return $this->tags;
        }
    }

    public function getTestCases() {
        return $this->testCases;
    }
    
    public function hasChildren(){
        
        if (count($this->testCases) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getApprovedInStyle() {
        $everythingApproved = $this->getApproved();

        if ($everythingApproved) {
            return "<span class='fa fa-check alert-success'></span>";
        } else {
            return "<span class='fa fa-close alert-danger'></span>";
        }
    }

    public function getApproved() {
        $everythingApproved = TRUE;
        foreach ($this->getTestCases()->getValues() as $testCase) {
            if ($testCase->approved == 0) {
                $everythingApproved = FALSE;
                break;
            }
        }

        return $everythingApproved;
    }
}
