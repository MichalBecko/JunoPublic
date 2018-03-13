<?php

namespace MailerModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    MailerModule\Entities\MailerDefault;

/**
 * Description of MailerDefaultRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerDefaultRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $mailerdefaultEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->mailerdefaultEntity = $em->getRepository(MailerDefault::getClassName());
    }

    /**
     * Inserts given entity
     * @param MailerDefault $mailerdefault
     */
    public function insert(MailerDefault $mailerdefault) {
        $this->em->persist($mailerdefault);
        $this->done();
    }

    /**
     * Updates given entity
     * @param MailerDefault $mailerdefault
     */
    public function update(MailerDefault $mailerdefault) {
        $this->em->persist($mailerdefault);
        $this->done();
    }

    /**
     * Removes given entity
     * @param MailerDefault $mailerdefault
     */
    public function delete(MailerDefault $mailerdefault) {
        $this->em->remove($mailerdefault);
        $this->done();
    }

    /**
     * Returns MailerDefault entity by given ID
     * @param int $id
     * @return MailerDefault
     */
    public function getById($id) {
        return $this->mailerdefaultEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->mailerdefaultEntity->findAll();
    }

    private function done() {
        $this->em->flush();
    }

}
