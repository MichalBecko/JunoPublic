<?php

namespace ClientModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    ClientModule\Entities\Client;

/**
 * Description of ClientyRepository
 *
 * @author Vladino
 */
class ClientRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $clientEntity;

    public function __construct(EntityManager $em)
    {
	$this->em = $em;
	$this->clientEntity = $em->getRepository(Client::getClassName());
    }
    
    /**
     * Returns client entity
     * @return Client
     */
    public function getClient() {
	return $this->clientEntity->find(1);
    }
    
    public function update(Client $client) {
	$this->em->persist($client);
        $this->done();
    }
    
    public function done() {
	$this->em->flush();
    }
    
}
