<?php

namespace MailerModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class MailerDefault extends DefaultEntity {

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
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $subject;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $body;

    public function getId() {
        return $this->id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getBody() {
        return $this->body;
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function setBody($body) {
        $this->body = $body;
    }


}
