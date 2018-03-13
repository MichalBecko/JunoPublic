<?php

namespace UserModule\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserWebRole extends \DefaultModule\Entities\DefaultEntity {
    
    use \Kdyby\Doctrine\Entities\MagicAccessors;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyTonOne(targetEntity="UserModule\Entities\User")
     */
    protected $user;

    /**
     * @ORM\ManyTonOne(targetEntity="ProjectModule\Entities\Role")
     */
    protected $role;

}
