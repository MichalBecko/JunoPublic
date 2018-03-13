<?php

namespace DefaultModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    DefaultModule\Entities\Address;

/**
 * Description of AddressRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AddressRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $addressEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->addressEntity = $em->getRepository(Address::getClassName());
    }

    /**
     * Inserts given entity
     * @param Address $address
     */
    public function insert(Address $address) {
        $this->em->persist($address);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Address $address
     */
    public function update(Address $address) {
        $this->em->persist($address);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Address $address
     */
    public function delete(Address $address) {
        $this->em->remove($address);
        $this->done();
    }

    /**
     * Returns Address entity by given ID
     * @param int $id
     * @return Address
     */
    public function getById($id) {
        return $this->addressEntity->find($id);
    }

    private function done() {
        $this->em->flush();
    }

}
