<?php

namespace DefaultModule\Services;

use Nette,
    DefaultModule\Repositories\AddressRepository,
    DefaultModule\Entities\Address;

/**
 * Description of AddressService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AddressService extends Nette\Object {

    /** @var AddressRepository */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository) {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Inserts Address entity
     * @param Address $address
     */
    public function insert(Address $address) {
        return $this->addressRepository->insert($address);
    }

    /**
     * Updates Address entity
     * @param Address $address
     */
    public function update(Address $address) {
        return $this->addressRepository->update($address);
    }

    /**
     * Deletes Address entity
     * @param Address $address
     */
    public function delete(Address $address) {
        return $this->addressRepository->delete($address);
    }

    /**
     * Returns Address entity by given ID
     * @param int $id
     * @return Address
     */
    public function getById($id) {
        return $this->addressRepository->getById($id);
    }

}
