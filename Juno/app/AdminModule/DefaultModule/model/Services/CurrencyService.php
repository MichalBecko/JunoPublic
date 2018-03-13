<?php

namespace DefaultModule\Services;

use Nette,
    DefaultModule\Repositories\CurrencyRepository,
    DefaultModule\Entities\Currency;

/**
 * Description of CurrencyService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class CurrencyService extends Nette\Object {

    /** @var CurrencyRepository */
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository) {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Inserts Currency entity
     * @param Currency $currency
     */
    public function insert(Currency $currency) {
        return $this->currencyRepository->insert($currency);
    }

    /**
     * Updates Currency entity
     * @param Currency $currency
     */
    public function update(Currency $currency) {
        return $this->currencyRepository->update($currency);
    }

    /**
     * Deletes Currency entity
     * @param Currency $currency
     */
    public function delete(Currency $currency) {
        return $this->currencyRepository->delete($currency);
    }

    /**
     * Returns Currency entity by given ID
     * @param int $id
     * @return Currency
     */
    public function getById($id) {
        return $this->currencyRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->currencyRepository->getAll();
    }

}
