<?php

namespace DefaultModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    DefaultModule\Entities\Currency;

/**
 * Description of CurrencyRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class CurrencyRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $currencyEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->currencyEntity = $em->getRepository(Currency::getClassName());
    }

    /**
     * Inserts given entity
     * @param Currency $currency
     */
    public function insert(Currency $currency) {
        $this->em->persist($currency);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Currency $currency
     */
    public function update(Currency $currency) {
        $this->em->persist($currency);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Currency $currency
     */
    public function delete(Currency $currency) {
        $this->em->remove($currency);
        $this->done();
    }

    /**
     * Returns Currency entity by given ID
     * @param int $id
     * @return Currency
     */
    public function getById($id) {
        return $this->currencyEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->currencyEntity->findAll();
    }

    private function done() {
        $this->em->flush();
    }

}
