<?php

namespace LogModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity,
    Nette\Utils\Json;

/**
 * @ORM\Entity
 */
class Log extends DefaultEntity {
    
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
    protected $description;

    /**
     * @ORM\Column(type="integer", name="action_id")
     */
    protected $action;

    /**
     * @ORM\Column(type="integer", name="privilege_id")
     */
    protected $privilege;

    /**
     * @ORM\Column(type="integer", name="tab_id")
     */
    protected $tab;

    /**
     * @ORM\Column(type="string")
     */
    protected $ip;

    /**
     * @ORM\ManyToOne(targetEntity="UserModule\Entities\User", inversedBy="logs")
     */
    protected $creator;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createDate;

    public static function create($action = NULL, $tab = NULL, $privilege = NULL) {
        $log = new static();
        $log->action = $action;
        $log->tab = $tab;
        $log->privilege = $privilege;
        return $log;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setTabId($tabId) {
        $this->tabId = $tabId;
    }

    public function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }

}
