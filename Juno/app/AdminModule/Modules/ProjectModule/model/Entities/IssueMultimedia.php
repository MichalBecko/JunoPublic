<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class IssueMultimedia extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia") */
    protected $multimedia;

    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Issue") */
    protected $issue;

}
