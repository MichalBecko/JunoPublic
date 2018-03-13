<?php

namespace ProjectModule\Entities;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;
use Nette\DateTime;
use ProjectModule\Classes\DefaultValues;

/**
 * @ORM\Entity
 */
class TestPlanSprint extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\Column(type="datetime") */
    protected $startDate;
    
    /** @ORM\Column(type="datetime") */
    protected $endDate;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestPlan") */
    protected $testPlan;

    /** @var  @ORM\Column(type="integer") */
    protected $testPlanId;
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="string") */
    protected $createDate;

    /**
     * @ORM\OneToMany(targetEntity="ProjectModule\Entities\Issue", mappedBy="testPlanSprint")
     * @ORM\OrderBy({"createDate" = "ASC"})
     */
    protected $issues;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestPlanSprintCase", mappedBy="testPlanSprint") */
    public $testPlanSprintCases;
    
    public function hasChildren(){
        return false;
    }

    public function getIssues() {
        $criteria = new Criteria();
        $criteria->where(Criteria::expr()->neq('status', 7));       //without close issues

        return $this->issues->matching($criteria);
    }

    public function getCountIssues() {
        return count($this->getIssues());
    }

    public function getTags() {
        $tags = [];
        foreach ($this->testPlanSprintCases as $testPlanSprintCase) {
            foreach ($testPlanSprintCase->getTestPlanCase()->getTestCase()->getTags() as $tag) {
                $tags[$tag->getId()] = $tag;
            }
        }

        return $tags;
    }

    public function getStatuses() {
        $sprintStatuses = [];
        foreach (DefaultValues::getStatuses() as $key => $status) {
            $sprintStatuses[$key] = 0;
        }

        foreach ($this->testPlanSprintCases as $case) {
            $sprintStatuses[$case->getStatusId()] += 1;
        }

        return $sprintStatuses;
    }

    public function getCountTestCase() {
        return count($this->testPlanSprintCases);
    }

    public function getTestCases() {
        $testCases = [];

        foreach ($this->testPlanSprintCases as $testPlanSprintCase) {
            $testCases[$testPlanSprintCase->getTestPlanCase()->getTestCase()->getId()] = $testPlanSprintCase->getTestPlanCase()->getTestCase();
        }

        return $testCases;
    }

    public function getActualProgress($date) {
        $actualProgress = 0;

        $criteria = new Criteria();
        $criteria->where(Criteria::expr()->lt("createDate", $date));

        foreach ($this->getTestPlanSprintCases() as $testPlanSprintCase) {
            $createDate = $testPlanSprintCase->getTestPlanCase()->getTestCase()->getCreateDate();
            if (($testPlanSprintCase->getStatusId() == 2 || $testPlanSprintCase->getStatusId() == 4) && $createDate <= $date) {
                $actualProgress++;
            }
        }
        return $actualProgress;
    }

    public function getPlannedProgress($date) {
        $plannedProgress = 0;

        foreach ($this->getTestCases() as $case) {
            if (!count($case->getTags())) {
                if ($this->startDate < $date) {
                    $plannedProgress++;
                }
            }

            $count = false;
            foreach ($case->getTags() as $tag) {
                if ($tag->getStartDate() < $date) {
                    $count = true;
                    break;
                }
            }

            if ($count) {
                $plannedProgress++;
            }
        }

        return $plannedProgress;
    }


}
