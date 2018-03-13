<?php

namespace DefaultModule\Services;

use Nette,
    DefaultModule\Repositories\BillingAddressRepository,
    DefaultModule\Entities\Billing_address;

/**
 * Description of BillingAddressService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class BillingAddressService extends \Nette\Object {

    /** @var BillingAddressRepository */
    private $billingaddressRepository;

    public function __construct(BillingAddressRepository $billingaddressRepository) {
        $this->billingaddressRepository = $billingaddressRepository;
    }

    /**
     * Inserts BillingAddress entity
     * @param BillingAddress $billingaddress
     */
    public function insert(\BillingAddress $billingaddress) {
        return $this->billingaddressRepository->insert($billingaddress);
    }

    /**
     * Updates BillingAddress entity
     * @param BillingAddress $billingaddress
     */
    public function update(BillingAddress $billingaddress) {
        return $this->billingaddressRepository->update($billingaddress);
    }

    /**
     * Deletes BillingAddress entity
     * @param BillingAddress $billingaddress
     */
    public function delete(BillingAddress $billingaddress) {
        return $this->billingaddressRepository->delete($billingaddress);
    }

    /**
     * Returns BillingAddress entity by given ID
     * @param int $id
     * @return BillingAddress
     */
    public function getById($id) {
        return $this->billingaddressRepository->getById($id);
    }

}
