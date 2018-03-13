<?php

namespace AuthorizatorModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of AuthorizatorExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class AuthorizatorExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('Authorizator'))
            ->setClass('AuthorizatorModule\Classes\Authorizator');

    }

}
