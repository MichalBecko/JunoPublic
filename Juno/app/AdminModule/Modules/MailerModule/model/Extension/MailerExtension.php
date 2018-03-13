<?php

namespace MailerModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of MailExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerExtension extends DefaultModuleExtension {
    
    public function loadConfiguration() {
        parent::loadConfiguration();
        
        $builder = $this->getContainerBuilder();
        
        $builder->addDefinition($this->prefix('mailerService'))
                ->setClass('MailerModule\Services\MailerService');

        $builder->addDefinition($this->prefix('mailerRepository'))
                ->setClass('MailerModule\Repositories\MailerRepository');     
        
        $builder->addDefinition($this->prefix('mailerDefaultService'))
                ->setClass('MailerModule\Services\MailerDefaultService');

        $builder->addDefinition($this->prefix('mailerDefaultRepository'))
                ->setClass('MailerModule\Repositories\MailerDefaultRepository'); 
        
        $builder->addDefinition($this->prefix('mailerDefaultFormFactory'))
                ->setClass('MailerModule\Factories\MailerDefaultFormFactory');
        
        $builder->addDefinition($this->prefix('mailerFormFactory'))
                ->setClass('MailerModule\Factories\MailerFormFactory');
        
        $builder->addDefinition($this->prefix('mailerSettingsFormFactory'))
                ->setClass('MailerModule\Factories\MailerSettingsFormFactory');
        
        $builder->addDefinition($this->prefix('mailerModuleSearch'))
                ->setClass('MailerModule\Classes\MailerModuleSearch');
        
        $builder->addDefinition($this->prefix('ISettingsControlFactory'))
                ->setImplement('MailerModule\Interfaces\ISettingsControlFactory');
    }
  
}
