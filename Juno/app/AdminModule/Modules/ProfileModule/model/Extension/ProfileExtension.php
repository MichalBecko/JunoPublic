<?php

namespace ProfileModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of ProfileExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProfileExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();   
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('updateProfileFormFactory'))
                ->setClass('ProfileModule\Factories\UpdateProfileFormFactory');
        
        $builder->addDefinition($this->prefix('ticketFormFactory'))
                ->setClass('ProfileModule\Factories\TicketFormFactory');

        
    }
    
    

}
