<?php

namespace DefaultModuleModule\Extension;

use Nette\DI\CompilerExtension,
    Kdyby\Doctrine\DI\IEntityProvider,
    Nette\Reflection\ClassType;

/**
 * Description of DefaultModuleExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
abstract class DefaultSubmoduleExtension extends CompilerExtension implements IEntityProvider {
    
    /**
     * If modul has entities
     * @var boolean
     */
    protected $hasEntities = TRUE;
    
    /**
     * Modul name
     * @var string
     */
    protected $moduleName;
    
    public function __construct() {
        
        $reflection = new ClassType($this);
        
        $moduleName = str_replace("Extension", "", $reflection->getShortName());
        $this->setModuleName($moduleName);		
	}
    
    // we need to register entities here for whole modul
    public function getEntityMappings() {
        // we set properties from config
        $this->setProperties();
		
        $mapping = [];
		if ($this->getHasEntities()) {
			$modulesDirectory = $this->getContainerBuilder()->parameters["modulesDir"];
			$mapping['ContentModule\\' . $this->getModuleName() . 'Module'] = $modulesDirectory . "/ContentModule/modules/".$this->getModuleName()."Module/model/Entities";
		}
        
        return $mapping;
        
    }
	
    protected function setProperties() {
        
        $config = $this->compiler->getConfig();
        $extensionName = $this->name;
        if (array_key_exists($extensionName, $config)) {
            
            foreach ($config[$extensionName] as $name => $value) {
                $this->$name = $value;
            }
            
        }
    }

    public function getModuleName() {
        return $this->moduleName;
    }

    public function setModuleName($moduleName) {
        $this->moduleName = $moduleName;
    }

    public function getHasEntities() {
        return $this->hasEntities;
    }

    public function setHasEntities($hasEntities) {
        $this->hasEntities = $hasEntities;
    }


    
}
