<?php

namespace HomepageModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of HomepageExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class HomepageExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        $this->appendRouteList("Admin:Homepage", '[<locale=sk sk|en>/]admin/login', "Homepage:login");
        parent::loadConfiguration();
        
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('loginPictureFormFactory'))
                ->setClass('HomepageModule\Factories\LoginPictureFormFactory');
        
        $builder->addDefinition($this->prefix('loginPictureService'))
                ->setClass('HomepageModule\Services\LoginPictureService');
        
        $builder->addDefinition($this->prefix('loginPictureRepository'))
                ->setClass('HomepageModule\Repositories\LoginPictureRepository');
        
        $builder->addDefinition($this->prefix('ISettingsControlFactory'))
                ->setImplement('HomepageModule\Interfaces\ISettingsControlFactory');
        
        $this->appendRouteList("Admin:Homepage", '[<locale=sk sk|en>/]admin/<action>[/<id>]', "Homepage:default");
    }
    
}
