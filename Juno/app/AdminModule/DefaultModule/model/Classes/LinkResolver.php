<?php

namespace DefaultModule\Classes;

use Nette\Http\UrlScript,
    Nette\Http\IRequest,
    Nette\Http\Request,
    Nette\Application\Request as ApplicationRequest,
    Nette\Application\IRouter,
    Nette\Object;

/**
 * Description of LinkResolver
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LinkResolver extends Object {
    
    private $string;
    
    /** @var IRouter */
    public $router;
    
    /** @var IRequest */
    public $httpRequest;
    
    /** @var Request */
    private $finalRequest;
    
    public function __construct($string, IRouter $router, IRequest $httpRequest) {
        $this->string = $string;
        $this->router = $router;
        $this->httpRequest = $httpRequest;
        
        $this->setupFinalRequest();
    }
    
    private function setupFinalRequest() {
        $url = new UrlScript($this->getString());
        $url->setScriptPath($this->getHttpRequest()->getUrl()->getScriptPath());
        
        $request = new Request($url);
        
        $this->setFinalRequest($this->getRouter()->match($request));
    }
    
    public function getNLink() {
        
        $nLink = trim(":".$this->getFinalRequest()->getPresenterName().":".$this->getFinalRequest()->getParameter("action") . " ".$this->getFinalRequest()->getParameter("id"));
        
        return $nLink;
    }
    
    private function setFinalRequest(ApplicationRequest $request) {
        $this->finalRequest = $request;
    }
    
    private function getString() {
        return $this->string;
    }
    
    private function getHttpRequest() {
        return $this->httpRequest;
    }
    
    private function getRouter() {
        return $this->router;
    }
    
    private function getFinalRequest() {
        return $this->finalRequest;
    }

    
}
