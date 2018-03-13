<?php

namespace DefaultModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    DefaultModule\Entities\Menuitem;

/**
 * Description of MenuitemRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MenuitemRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $menuitemEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->menuitemEntity = $em->getRepository(Menuitem::getClassName());
    }

    /**
     * Inserts given entity
     * @param Menuitem $menuitem
     */
    public function insert(Menuitem $menuitem) {
        $this->em->persist($menuitem);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Menuitem $menuitem
     */
    public function update(Menuitem $menuitem) {
        $this->em->persist($menuitem);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Menuitem $menuitem
     */
    public function delete(Menuitem $menuitem) {
        $this->em->remove($menuitem);
        $this->done();
    }

    /**
     * Returns Menuitem entity by given ID
     * @param int $id
     * @return Menuitem
     */
    public function getById($id) {
        return $this->menuitemEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->menuitemEntity->findAll();
    }
    
    /**
     * Returns all entities
     * @return array
     */
    public function getAllMain() {
        $result = $this->menuitemEntity->createQueryBuilder();
        $result->from("DefaultModule\Entities\Menuitem", "mi")
            ->select("mi")
            ->leftJoin("mi.menuitem", "mifk")
            ->where("mifk.name is null")
            ->orderBy("mi.sort");
        return $result->getQuery()->getResult();
    }
    
    /**
     * Returns all active entities
     * @return array
     */
    public function getAllMainAndActive() {
        $result = $this->menuitemEntity->createQueryBuilder();
        $result->from("DefaultModule\Entities\Menuitem", "mi")
            ->select("mi")
            ->leftJoin("mi.menuitem", "mifk")
            ->leftJoin("mi.resource", "mir")
            ->where("mifk.name is null")
            ->andWhere("mir.active = 1")
            ->orderBy("mi.sort");
        return $result->getQuery()->getResult();
    }
    
    public function getByName($name) {
        
        $result = $this->menuitemEntity->createQueryBuilder()
                ->select("mi")
                ->from("DefaultModule\Entities\Menuitem", "mi")
                ->where("mi.name = :name")
                ->setParameter("name", $name)
                ->getQuery()
                ->getSingleResult();
        
        return $result;
    }
    
    public function getByResourceId($id) {
        
        $resource = $this->em->createQueryBuilder()
                ->select("r")
                ->from("UserModule\Entities\Resource", "r")
                ->where("r.id = :id")
                ->setParameter("id", $id)
                ->getQuery()
                ->getSingleResult();
        
        $result = $this->menuitemEntity->createQueryBuilder()
                ->select("mi")
                ->from("DefaultModule\Entities\Menuitem", "mi")
                ->where("mi.resource = :resource")
                ->andWhere("mi.menuitem is null")
                ->setParameter("resource", $resource)
                ->getQuery()
                ->getSingleResult();
        
        return $result;
    }

    private function done() {
        $this->em->flush();
    }

}