<?php

namespace DefaultModule\Services;

use Nette,
    Nette\Http\Request;

/**
 * Description of DirService
 *
 * @author Vladino
 */
class DirService extends Nette\Object {
    
    private $wwwDir;
    
    private $appDir;
    
    private $blocksDir;
    
    private $basePath;
    
    private $bower;
    
    private $pdfDir;
    
    private $modulesDir;
    
    public function __construct($wwwDir, $appDir, Request $httpRequest) {
	
	$this->wwwDir = $wwwDir;
	$this->appDir = $appDir;
	
	$baseUrl = $httpRequest ? rtrim($httpRequest->getUrl()->getBaseUrl(), '/') : NULL;
	$this->basePath = preg_replace('#https?://[^/]+#A', '', $baseUrl) . "/";
        
        $this->blocksDir = $appDir."/AdminModule/DefaultModule/templates/Blocks";	
        $this->pdfDir = $appDir."/AdminModule/DefaultModule/templates/Pdf";	
        
        $this->modulesDir = $appDir . "/AdminModule/Modules";
        
        $this->bower = $this->basePath . "bower_components";
    }
    
    public function getWwwDir() {
        return $this->wwwDir;
    }

    public function getAppDir() {
        return $this->appDir;
    }

    public function getBlocksDir() {
        return $this->blocksDir;
    }

    public function getBasePath() {
        return $this->basePath;
    }

    public function getPdfDir() {
        return $this->pdfDir;
    }

    public function getModulesDir() {
        return $this->modulesDir;
    }
    
    public function getBower() {
        return $this->bower;
    }

    public function setBower($bower) {
        $this->bower = $bower;
    }

    public function setWwwDir($wwwDir) {
        $this->wwwDir = $wwwDir;
    }

    public function setAppDir($appDir) {
        $this->appDir = $appDir;
    }

    public function setBlocksDir($blocksDir) {
        $this->blocksDir = $blocksDir;
    }

    public function setBasePath($basePath) {
        $this->basePath = $basePath;
    }

    public function setPdfDir($pdfDir) {
        $this->pdfDir = $pdfDir;
    }

    public function setModulesDir($modulesDir) {
        $this->modulesDir = $modulesDir;
    }


    
}
