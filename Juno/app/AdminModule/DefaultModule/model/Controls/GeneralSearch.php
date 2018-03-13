<?php

namespace DefaultModule\Controls;

use Nette\Application\UI\Control,
    UserModule\Services\User,
    Nette\DI\Container;

/**
 * Description of GeneralSearch
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class GeneralSearch extends Control {
    
    /** @var User */
    private $user;
    
    /** @var Container */
    private $container;
    
    private $query;
    
    /** List of modules that have search */
    const SEARCH_MODULES = ["mailer", "contact", "invoice"];
    
    public function __construct($query, User $user, Container $container) {
        $this->query = $query;
        $this->user = $user;
        $this->container = $container;
    }

    /**
     * Checks allowed modules for current user
     * and performs search in them
     * For each module it renders its search result
     */
    public function render() {
        
        $activeResources = $this->resourceService->getAllActive();
        
        foreach ($activeResources as $activeResource) {
            if ($this->user->isAllowed($activeResource->getName(), "view")) {
                $this->performSearch($activeResource->getName());
            }
        } 
    }
    
    /**
     * Performs search in certain module
     * and renders out given result
     * @param string $resourceName
     */
    private function performSearch($resourceName) {
        
        $template = $this->getTemplate();
        
        if (in_array($resourceName, self::SEARCH_MODULES)) {
            $moduleSearch = $this->container->getService($resourceName.".".$resourceName."ModuleSearch");
            $moduleSearch->setup($this->getQuery());
            $template = $moduleSearch->getTemplate();
            $template->render();
        }
    }
    
    private function getQuery() {
        return $this->query;
    }
    
}
