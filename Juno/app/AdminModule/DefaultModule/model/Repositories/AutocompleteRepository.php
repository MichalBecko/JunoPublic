<?php

namespace DefaultModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    DefaultModule\Entities\Autocomplete;

/**
 * Description of AutocompleteRepository
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AutocompleteRepository extends Nette\Object {

    /**
     * @var EntityManager 
     */
    private $em;

    /**
     * @var EntityRepository 
     */
    private $autocompleteEntity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->autocompleteEntity = $em->getRepository(Autocomplete::getClassName());
    }

    /**
     * Inserts given entity
     * @param Autocomplete $autocomplete
     */
    public function insert(Autocomplete $autocomplete) {
        $this->em->persist($autocomplete);
        $this->done();
    }

    /**
     * Updates given entity
     * @param Autocomplete $autocomplete
     */
    public function update(Autocomplete $autocomplete) {
        $this->em->persist($autocomplete);
        $this->done();
    }

    /**
     * Removes given entity
     * @param Autocomplete $autocomplete
     */
    public function delete(Autocomplete $autocomplete) {
        $this->em->remove($autocomplete);
        $this->done();
    }

    /**
     * Returns Autocomplete entity by given ID
     * @param int $id
     * @return Autocomplete
     */
    public function getById($id) {
        return $this->autocompleteEntity->find($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->autocompleteEntity->findAll();
    }

    private function done() {
        $this->em->flush();
    }

}
