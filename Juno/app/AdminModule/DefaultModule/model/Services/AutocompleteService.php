<?php

namespace DefaultModule\Services;

use Nette,
    DefaultModule\Repositories\AutocompleteRepository,
    DefaultModule\Entities\Autocomplete;

/**
 * Description of AutocompleteService
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AutocompleteService extends Nette\Object {

    /** @var AutocompleteRepository */
    private $autocompleteRepository;

    public function __construct(AutocompleteRepository $autocompleteRepository) {
        $this->autocompleteRepository = $autocompleteRepository;
    }

    /**
     * Inserts Autocomplete entity
     * @param Autocomplete $autocomplete
     */
    public function insert(Autocomplete $autocomplete) {
        return $this->autocompleteRepository->insert($autocomplete);
    }

    /**
     * Updates Autocomplete entity
     * @param Autocomplete $autocomplete
     */
    public function update(Autocomplete $autocomplete) {
        return $this->autocompleteRepository->update($autocomplete);
    }

    /**
     * Deletes Autocomplete entity
     * @param Autocomplete $autocomplete
     */
    public function delete(Autocomplete $autocomplete) {
        return $this->autocompleteRepository->delete($autocomplete);
    }

    /**
     * Returns Autocomplete entity by given ID
     * @param int $id
     * @return Autocomplete
     */
    public function getById($id) {
        return $this->autocompleteRepository->getById($id);
    }

    /**
     * Returns all entities
     * @return array
     */
    public function getAll() {
        return $this->autocompleteRepository->getAll();
    }
    
    public function getAsElementIdValues() {
        
        $autocompletes = $this->getAll();
        $arr = [];        
        foreach ($autocompletes as $a) {
            if (array_key_exists($a->getElementId(), $arr)) {
                $arr[$a->getElementId()][] = $a->getValue();
            } else {
                $arr[$a->getElementId()] = [$a->getValue()];
            }
        }
        
        return $arr;
    }

}
