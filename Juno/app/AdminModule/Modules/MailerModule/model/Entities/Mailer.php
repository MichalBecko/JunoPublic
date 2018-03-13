<?php

namespace MailerModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Mailer extends \DefaultModule\Entities\DefaultEntity {
    
    use \Kdyby\Doctrine\Entities\MagicAccessors;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $recipient;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $subject;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $body;
    
    /**
     * @ORM\Column(type="datetime", name="sent_date")
     */
    protected $sentDate;
    
    /**
     * @ORM\OneToMany(targetEntity="MailerModule\Entities\MailerAttachment", mappedBy="mailer", cascade={"persist", "remove"})
     * @var MailerAttachment[]|ArrayCollection
     */
    protected $attachments;
    
    public function __construct() {
        $this->attachments = new ArrayCollection();
    }
    
    public function addAttachment(MailerAttachment $mailerAttachment) {
        $this->attachments->add($mailerAttachment);
    }
}
