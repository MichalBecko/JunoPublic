<?php

namespace MailerModule\Services;

use Nette,
    MailerModule\Repositories\MailerDefaultRepository,
    MailerModule\Entities\MailerDefault;

/**
 * Description of MailerDefaultService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerDefaultService extends Nette\Object {

    /** @var MailerDefaultRepository */
    private $mailerdefaultRepository;

    public function __construct(MailerDefaultRepository $mailerdefaultRepository) {
        $this->mailerdefaultRepository = $mailerdefaultRepository;
    }

    /**
     * Inserts MailerDefault entity
     * @param MailerDefault $mailerdefault
     */
    public function insert(MailerDefault $mailerdefault) {
        return $this->mailerdefaultRepository->insert($mailerdefault);
    }

    /**
     * Updates MailerDefault entity
     * @param MailerDefault $mailerdefault
     */
    public function update(MailerDefault $mailerdefault) {
        return $this->mailerdefaultRepository->update($mailerdefault);
    }

    /**
     * Deletes MailerDefault entity
     * @param MailerDefault $mailerdefault
     */
    public function delete(MailerDefault $mailerdefault) {
        return $this->mailerdefaultRepository->delete($mailerdefault);
    }

    /**
     * Returns MailerDefault entity by given ID
     * @param int $id
     * @return MailerDefault
     */
    public function getById($id) {
        return $this->mailerdefaultRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->mailerdefaultRepository->getAll();
    }

}
