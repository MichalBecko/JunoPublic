<?php

namespace HomepageModule\Services;

use Nette,
    HomepageModule\Repositories\LoginPictureRepository,
    HomepageModule\Entities\LoginPicture;

/**
 * Description of LoginPictureService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LoginPictureService extends Nette\Object {

    /** @var LoginPictureRepository */
    private $loginpictureRepository;

    public function __construct(LoginPictureRepository $loginpictureRepository) {
        $this->loginpictureRepository = $loginpictureRepository;
    }

    /**
     * Inserts LoginPicture entity
     * @param LoginPicture $loginpicture
     */
    public function insert(LoginPicture $loginpicture) {
        return $this->loginpictureRepository->insert($loginpicture);
    }

    /**
     * Updates LoginPicture entity
     * @param LoginPicture $loginpicture
     */
    public function update(LoginPicture $loginpicture) {
        return $this->loginpictureRepository->update($loginpicture);
    }

    /**
     * Deletes LoginPicture entity
     * @param LoginPicture $loginpicture
     */
    public function delete(LoginPicture $loginpicture) {
        return $this->loginpictureRepository->delete($loginpicture);
    }

    /**
     * Returns LoginPicture entity by given ID
     * @param int $id
     * @return LoginPicture
     */
    public function getById($id) {
        return $this->loginpictureRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->loginpictureRepository->getAll();
    }

}
