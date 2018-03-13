<?php

namespace ProjectModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity;

/**
 * @ORM\Entity
 */
class ProjectRole extends DefaultEntity {

    use \Kdyby\Doctrine\Entities\MagicAccessors;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /** @ORM\ManyToOne(targetEntity="UserModule\Entities\User") */
    protected $user;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Role") */
    protected $role;
    
    /** @ORM\Column(name="role_id", type="string") */
    protected $roleID;
    
    /** @ORM\ManyToOne(targetEntity="ProjectModule\Entities\Project") */
    protected $project;

}
