<?php

namespace ProjectModule\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class IssueComment extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $description;

    /** @ORM\Column(type="datetime") */
    protected $createDate;

    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $author;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Issue") */
    protected $issue;

}
