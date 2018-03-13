<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class TestCase extends DefaultEntity {

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
    
    /** @ORM\Column(type="string") */
    protected $result;
    
    /** @ORM\Column(type="string") */
    protected $priority;

    /** @ORM\Column(type="integer") */
    protected $approved;
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="datetime") */
    protected $createDate;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestSet", inversedBy="testCases") */
    protected $testSet;
    
    /** @ORM\ManyToMany(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist", "remove"}) */
    protected $multimedias;
    
    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestStep", mappedBy="testCase", cascade={"persist"}, orphanRemoval=true) */
    protected $testSteps;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TagTestCase", mappedBy="testCase", cascade={"persist"}, orphanRemoval=true) */
    protected $tags;

    public function __construct() {
        $this->multimedias = new ArrayCollection();
        $this->testSteps = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }
    
    public function hasChildren() {
        return false;
    }

    public function getTestSteps() {
        return $this->testSteps;
    }

    public function getMultimedias() {
        return $this->multimedias;
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

    public function getApprovedInStyle() {
        if ($this->approved == 1) {
            return "<span class='fa fa-check alert-success'></span>";
        } else {
            return "<span class='fa fa-close alert-danger'></span>";
        }
    }

}
