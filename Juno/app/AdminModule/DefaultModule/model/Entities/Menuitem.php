<?php

namespace DefaultModule\Entities;

use Doctrine\ORM\Mapping as ORM,
    DefaultModule\Entities\DefaultEntity,
    Doctrine\Common\Collections\Criteria;

/**
 * @ORM\Entity
 */
class Menuitem extends DefaultEntity {

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
    protected $glyphicon;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $link;
    
    /**
     * @ORM\OneToMany(targetEntity="DefaultModule\Entities\Menuitem", mappedBy="menuitem")
     * @ORM\OrderBy({"sort" = "ASC"})
     */
    protected $submenuitems;
    
    /**
     * @ORM\ManyToOne(targetEntity="DefaultModule\Entities\Menuitem", inversedBy="submenuitems")
     */
    protected $menuitem;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $sort;

    /**
     * @ORM\Column(type="integer")
     */
    protected $privilegeId;
    
    public function getActiveSubmenuitems() {
        return $this->getSubmenuitems();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGlyphicon() {
        return $this->glyphicon;
    }

    public function getLink() {
        return $this->link;
    }

    public function getResource() {
        return $this->resource;
    }

    public function getSubmenuitems() {
        return $this->submenuitems;
    }

    public function getMenuitem() {
        return $this->menuitem;
    }

    public function getSort() {
        return $this->sort;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setGlyphicon($glyphicon) {
        $this->glyphicon = $glyphicon;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setResource($resource) {
        $this->resource = $resource;
    }

    public function setSubmenuitems($submenuitems) {
        $this->submenuitems = $submenuitems;
    }

    public function setMenuitem($menuitem) {
        $this->menuitem = $menuitem;
    }

    public function setSort($sort) {
        $this->sort = $sort;
    }
   
}
