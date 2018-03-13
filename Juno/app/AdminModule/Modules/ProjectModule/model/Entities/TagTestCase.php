<?php

namespace ProjectModule\Entities;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class TagTestCase extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\TestCase", inversedBy="tags") */
    protected $testCase;

    /** @ORM\Column(type="date") */
    protected $startDate;

    /** @ORM\Column(type="date") */
    protected $endDate;

    public function getTagOrSprintStartDate($sprintStartDate) {
        return $this->startDate ? $this->startDate : $sprintStartDate;
    }

    public function getTagOrSprintEndDate($sprintEndDate) {
        return $this->endDate ? $this->endDate : $sprintEndDate;
    }

    public function getUniqueName() {
        return $this->name . $this->id;
    }

    public function getProgress() {
        if (!$this->countAllStatus()) {
            return 100;
        }

        return round(($this->countRightStatus() / $this->countAllStatus()) * 100);
    }

    public function countAllStatus($date = null) {
        $allStatuses = 0;

        foreach ($this->getTestExecutionsByDate($date) as $testStepExecution) {
            $allStatuses += 1;
        }

        return $allStatuses;
    }


    public function countRightStatus($date = null) {
        $rightStatuses = 0;

        foreach ($this->getTestExecutionsByDate($date) as $testStepExecution) {
            if($testStepExecution->getStatusId() != 2 && $testStepExecution->getStatusId() != 4) {
                $rightStatuses += 1;
            }
        }

        return $rightStatuses;
    }

    private function getTestExecutionsByDate($date) {
        $testStepExecutions = [];
        if ($date) {
            $criteria = new Criteria();
            $criteria->where(Criteria::expr()->lt("createDate", $date));

            foreach ($this->testCase->getTestSteps() as $testStep) {
                foreach ($testStep->getTestStepExecutions()->matching($criteria) as $testStepExecution) {
                    $testStepExecutions[] = $testStepExecution;
                }
            }
        } else {
            foreach ($this->testCase->getTestSteps() as $testStep) {
                foreach ($testStep->getTestStepExecutions() as $testStepExecution) {
                    $testStepExecutions[] = $testStepExecution;
                }
            }
        }

        return $testStepExecutions;
    }

    public function getCountTestDays() {
        return $this->endDate->diff($this->startDate)->format('%a');
    }

}
