<?php

namespace HomepageModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    HomepageModule\Entities\LoginPicture;

/**
 * Description of LoginPictureRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LoginPictureRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $loginpictureEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->loginpictureEntity = $em->getRepository(LoginPicture::getClassName());
    }

    /**
     * Inserts given entity
     * @param LoginPicture $loginpicture
     */
    public function insert(LoginPicture $loginpicture) {
        $this->em->persist($loginpicture);
        $this->done();
    }

    /**
     * Updates given entity
     * @param LoginPicture $loginpicture
     */
    public function update(LoginPicture $loginpicture) {
        $this->em->persist($loginpicture);
        $this->done();
    }

    /**
     * Removes given entity
     * @param LoginPicture $loginpicture
     */
    public function delete(LoginPicture $loginpicture) {
        $this->em->remove($loginpicture);
        $this->done();
    }

    /**
     * Returns LoginPicture entity by given ID
     * @param int $id
     * @return LoginPicture
     */
    public function getById($id) {
        return $this->loginpictureEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->loginpictureEntity->findAll();
    }

    private function done() {
        $this->em->flush();
    }

}
