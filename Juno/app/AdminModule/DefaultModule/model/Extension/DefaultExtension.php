<?php

namespace DefaultModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of ClientExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DefaultExtension extends DefaultModuleExtension  {

    public function loadConfiguration() {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();
        
        $builder->addDefinition($this->prefix('AppSetupService'))
            ->setClass('DefaultModule\Services\AppSetupService');
        $builder->addDefinition($this->prefix('SimpleEntityService'))
            ->setClass('DefaultModule\Services\SimpleEntityService');
        $builder->addDefinition($this->prefix('HydratorService'))
            ->setClass('DefaultModule\Services\HydratorService');
        $builder->addDefinition($this->prefix('AddressService'))
            ->setClass('DefaultModule\Services\AddressService');
        $builder->addDefinition($this->prefix('BillingAddressService'))
            ->setClass('DefaultModule\Services\BillingAddressService');
        $builder->addDefinition($this->prefix('AutocompleteService'))
            ->setClass('DefaultModule\Services\AutocompleteService');
        $builder->addDefinition($this->prefix('CurrencyService'))
            ->setClass('DefaultModule\Services\CurrencyService');
        $builder->addDefinition($this->prefix('MenuitemService'))
            ->setClass('DefaultModule\Services\MenuitemService');
        $builder->addDefinition($this->prefix('AddressRepository'))
            ->setClass('DefaultModule\Repositories\AddressRepository');
        $builder->addDefinition($this->prefix('BillingAddressRepository'))
            ->setClass('DefaultModule\Repositories\BillingAddressRepository');
        $builder->addDefinition($this->prefix('CurrencyRepository'))
            ->setClass('DefaultModule\Repositories\CurrencyRepository');
        $builder->addDefinition($this->prefix('AutocompleteRepository'))
            ->setClass('DefaultModule\Repositories\AutocompleteRepository');
        $builder->addDefinition($this->prefix('MenuitemRepository'))
            ->setClass('DefaultModule\Repositories\MenuitemRepository');
        $builder->addDefinition($this->prefix('TranslatedFormFactory'))
            ->setClass('DefaultModule\Factories\TranslatedFormFactory');
        $builder->addDefinition($this->prefix('VisualPaginatorFactory'))
            ->setClass('DefaultModule\Factories\VisualPaginatorFactory');
        $builder->addDefinition($this->prefix('DatagridFactory'))
            ->setClass('DefaultModule\Factories\DatagridFactory');
        $builder->addDefinition($this->prefix('GeneralSearchFormFactory'))
            ->setClass('DefaultModule\Factories\GeneralSearchFormFactory');
        $builder->addDefinition($this->prefix('MyMailer'))
            ->setClass('DefaultModule\Classes\MyMailer');
        $builder->addDefinition($this->prefix('ILinkResolverFactory'))
            ->setImplement('DefaultModule\Interfaces\ILinkResolverFactory');
        $builder->addDefinition($this->prefix('IGeneralSearch'))
            ->setImplement('DefaultModule\Interfaces\IGeneralSearch');

        $builder->addDefinition($this->prefix('DirService'))
            ->setClass('DefaultModule\Services\DirService', [
                $builder->parameters["wwwDir"],
                $builder->parameters["appDir"],
                "@Nette\Http\Request"
            ]);
//        $builder->addDefinition($this->prefix('routerFactory'))
//            ->setClass('App\RouterFactory', [
//                $builder->parameters["createdRoutes"]
//            ]);
////        
//        $builder->addDefinition($this->prefix("router"))
//                
//                ->setClass("Nette\Application\IRouter")
//                ->addSetup("@routerFactory::createRouter");
        
//        $builder->addDefinition($this->prefix("router"));
//            ->;
//        die();
//        @routerFactory::createRouter
    }
    

}
