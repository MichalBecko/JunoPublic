<?php

namespace DefaultModule\Services;

use Nette,
    DefaultModule\Repositories\MenuitemRepository,
    DefaultModule\Entities\Menuitem;

/**
 * Description of MenuitemService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MenuitemService extends Nette\Object {

    /** @var MenuitemRepository */
    private $menuitemRepository;

    public function __construct(MenuitemRepository $menuitemRepository) {
        $this->menuitemRepository = $menuitemRepository;
    }

    /**
     * Inserts Menuitem entity
     * @param Menuitem $menuitem
     */
    public function insert(Menuitem $menuitem) {
        return $this->menuitemRepository->insert($menuitem);
    }

    /**
     * Updates Menuitem entity
     * @param Menuitem $menuitem
     */
    public function update(Menuitem $menuitem) {
        return $this->menuitemRepository->update($menuitem);
    }

    /**
     * Deletes Menuitem entity
     * @param Menuitem $menuitem
     */
    public function delete(Menuitem $menuitem) {
        return $this->menuitemRepository->delete($menuitem);
    }

    /**
     * Returns Menuitem entity by given ID
     * @param int $id
     * @return Menuitem
     */
    public function getById($id) {
        return $this->menuitemRepository->getById($id);
    }

    public function getByName($name) {
        return $this->menuitemRepository->getByName($name);
    }
    
    public function getByResourceId($id) {
        return $this->menuitemRepository->getByResourceId($id);
    }
    
    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->menuitemRepository->getAll();
    }
    
    public function getAllMain() {
        return $this->menuitemRepository->getAllMain();
    }
    
    public function getAllMainAndActive() {
        return $this->menuitemRepository->getAllMainAndActive();
    }

}
