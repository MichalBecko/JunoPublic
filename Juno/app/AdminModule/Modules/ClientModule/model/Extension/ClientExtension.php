<?php

namespace ClientModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of ClientExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ClientExtension extends DefaultModuleExtension  {

    public function loadConfiguration() {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('clientService'))
                ->setClass('ClientModule\Services\ClientService');

        $builder->addDefinition($this->prefix('clientRepository'))
                ->setClass('ClientModule\Repositories\ClientRepository');

//        $builder->addDefinition($this->prefix(''))
//            ->setClass('');
    }
    
    

}
