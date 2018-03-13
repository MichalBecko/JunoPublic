<?php

namespace HomepageModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="login_picture")
 */
class LoginPicture extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="MultimediaModule\Entities\Multimedia", cascade={"persist"})
     */
    protected $multimedia;
    
    public function getId() {
        return $this->id;
    }

    public function getMultimedia() {
        return $this->multimedia;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMultimedia($multimedia) {
        $this->multimedia = $multimedia;
    }



}
