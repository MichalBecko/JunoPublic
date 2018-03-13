<?php

namespace ProjectModule\Entities;

use DefaultModule\Entities\DefaultEntity;
use Doctrine\ORM\Mapping as ORM;
use Nette\Utils\Strings;
use ProjectModule\Classes\DefaultValues;

/**
 * @ORM\Entity
 */
class Project extends DefaultEntity {

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
    protected $nameSafe;

    /** @ORM\Column(type="string") */
    protected $description;

    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $creator;
    
    /** @ORM\Column(type="datetime") */
    protected $createDate;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\TestPlan", mappedBy="project")*/
    protected $testPlans;

    /** @ORM\OneToMany(targetEntity="ProjectModule\Entities\Issue", mappedBy="project") */
    protected $issues;

    public function setName($name) {
        $this->name = $name;
        $this->nameSafe = $this->getId() . "-" . Strings::webalize($name);
    }

    public function getProjectStatus() {
        $statusStatistic = [];
        foreach (DefaultValues::getStatuses() as $key => $status) {
            $statusStatistic[$key] = 0;
        }
        $statusStatistic["allStatusCount"] = 0;

        foreach ($this->getIssues() as $issue) {
            $statusStatistic[$issue->getStatus()] += 1;
            $statusStatistic["allStatusCount"]++;
        }

        return $statusStatistic;
    }
}
