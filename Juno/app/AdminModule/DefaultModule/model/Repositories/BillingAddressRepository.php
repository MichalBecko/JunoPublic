<?php

namespace DefaultModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    DefaultModule\Entities\Billing_address;

/**
 * Description of BillingAddressRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class BillingAddressRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $billingaddressEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->billingaddressEntity = $em->getRepository(Billing_address::getClassName());
    }

    /**
     * Inserts given entity
     * @param Billing_address $billingaddress
     */
    public function insert(BillingAddress $billingaddress) {
        $this->em->persist($billingaddress);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Billing_address $billingaddress
     */
    public function update(BillingAddress $billingaddress) {
        $this->em->persist($billingaddress);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Billing_address $billingaddress
     */
    public function delete(BillingAddress $billingaddress) {
        $this->em->remove($billingaddress);
        $this->done();
    }

    /**
     * Returns BillingAddress entity by given ID
     * @param int $id
     * @return Billing_address
     */
    public function getById($id) {
        return $this->billingaddressEntity->find($id);
    }

    private function done() {
        $this->em->flush();
    }

}
