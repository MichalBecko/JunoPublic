<?php

namespace UserModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of UserExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class UserExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('userService'))
                ->setClass('UserModule\Services\UserService');

        $builder->addDefinition($this->prefix('userRepository'))
                ->setClass('UserModule\Repositories\UserRepository');
        
        $builder->getDefinition("user")
                ->setClass('UserModule\Services\User');

        $builder->addDefinition($this->prefix('userFormFactory'))
                ->setClass('UserModule\Factories\UserFormFactory');
        
        $builder->addDefinition($this->prefix('LostPasswordFormFactory'))
                ->setClass('UserModule\Factories\LostPasswordFormFactory');
        
    }
    
    

}
