<?php

namespace AuthenticationModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of AuthenticationExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AuthenticationExtension extends DefaultModuleExtension  {

    public function loadConfiguration() {

        $builder = $this->getContainerBuilder();
        
        $builder->addDefinition($this->prefix('loginFormFactory'))
                ->setClass('AuthenticationModule\Factories\LoginFormFactory');
        
        $builder->addDefinition($this->prefix('authentication'))
                ->setClass('AuthenticationModule\Classes\Authentication');
        
    }
    
    

}
