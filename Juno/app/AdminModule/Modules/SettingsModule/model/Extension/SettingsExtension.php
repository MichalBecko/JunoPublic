<?php

namespace SettingsModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of SettingsExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SettingsExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('settingsService'))
                ->setClass('SettingsModule\Services\SettingsService');

        $builder->addDefinition($this->prefix('settingsRepository'))
                ->setClass('SettingsModule\Repositories\SettingsRepository');
        
        $builder->addDefinition($this->prefix('groupFormFactory'))
                ->setClass('SettingsModule\Factories\GroupFormFactory');
        
        $builder->addDefinition($this->prefix('fieldFormFactory'))
                ->setClass('SettingsModule\Factories\FieldFormFactory');
        
        $builder->addDefinition($this->prefix('generalSettingsFormFactory'))
                ->setClass('SettingsModule\Factories\GeneralSettingsFormFactory');
        
        $builder->addDefinition($this->prefix('SettingsManager'))
                ->setClass('SettingsModule\Services\SettingsManager');
    }

    
    
}
