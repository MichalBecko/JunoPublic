<?php

namespace DefaultModuleModule\Extension;

use Nette\DI\CompilerExtension,
    Kdyby\Doctrine\DI\IEntityProvider,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route,
    Nette\Utils\Strings,
    Nette\Reflection\ClassType;

/**
 * Description of DefaultModuleExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
abstract class DefaultModuleExtension extends CompilerExtension implements IEntityProvider {
    
    /**
     * If module has route or no
     * @var boolean 
     */
    protected $hasRoute = TRUE;
    
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
            $mapping[$this->getModuleName() . 'Module'] = $modulesDirectory . "/".$this->getModuleName()."Module/model/Entities";
        }
        
        return $mapping;
    }
    
    public function loadConfiguration() {
        $smallModuleName = Strings::lower($this->getModuleName());
        
        if ($this->getHasRoute()) {
            $this->appendRouteList('Admin:'.$this->getModuleName(), '[<locale=sk sk|en>/]admin/'.$smallModuleName.'/<presenter>/<action>[/<id>]', $this->getModuleName().':default');
            $this->appendRouteList('Admin:'.$this->getModuleName(), '[<locale=sk sk|en>/]admin/'.$smallModuleName.'/<action>[/<id>]', $this->getModuleName().':default');
        }
    }
    
    /**
     * Inserts route list to current router
     * @param type $routelist
     * @param type $routemask
     * @param type $destination
     */
    protected function appendRouteList($routelist, $routemask, $destination) {            
        
        $newRouteList = new RouteList($routelist);
        $newRoute = new Route($routemask, $destination);
        $newRouteList[] = $newRoute;

        $builder = $this->getContainerBuilder();
        $builder->parameters["createdRoutes"][] = $newRouteList;
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
	
    public function getHasRoute() {
            return $this->hasRoute;
    }

    public function getHasEntities() {
            return $this->hasEntities;
    }

    public function getModuleName() {
            return $this->moduleName;
    }

    public function setHasRoute($hasRoute) {
            $this->hasRoute = $hasRoute;
    }

    public function setHasEntities($hasEntities) {
            $this->hasEntities = $hasEntities;
    }

    public function setModuleName($moduleName) {
            $this->moduleName = $moduleName;
    }
    
}
