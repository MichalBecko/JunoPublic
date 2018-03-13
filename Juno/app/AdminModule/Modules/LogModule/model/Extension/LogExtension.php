<?php

namespace LogModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of LogExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LogExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('logService'))
                ->setClass('LogModule\Services\LogService');

        $builder->addDefinition($this->prefix('logRepository'))
                ->setClass('LogModule\Repositories\LogRepository');

//        $builder->addDefinition($this->prefix(''))
//            ->setClass('');
    }
    
    

}
