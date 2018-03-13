<?php

namespace MailerModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class MailerAttachment extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="MailerModule\Entities\Mailer", inversedBy="attachments")
     */
    protected $mailer;
    
    /**
     * @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist", "remove"})
     */
    protected $multimedia;

}
