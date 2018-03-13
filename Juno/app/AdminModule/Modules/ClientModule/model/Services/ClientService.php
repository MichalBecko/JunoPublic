<?php

namespace ClientModule\Services;

use Nette,
    ClientModule\Repositories\ClientRepository,
    ClientModule\Entities\Client;

/**
 * Description of ClientService
 *
 * @author Vladino
 */
class ClientService extends Nette\Object {
    
    /**
     *
     * @var ClientRepository 
     */
    public $clientRepository;
    
    public function __construct(ClientRepository $clientRepository) {
	
	$this->clientRepository = $clientRepository;
	
    }
    
    /**
     * Updates client entity
     * @param Client $client
     */
    public function update(Client $client) {
	$this->clientRepository->update($client);
    }
    
    /**
     * Returns client entity
     * @return Client
     */
    public function getClient() {
	return $this->clientRepository->getClient();
    }
    
}
