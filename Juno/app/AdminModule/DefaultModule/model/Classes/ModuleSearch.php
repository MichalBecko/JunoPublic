<?php

namespace DefaultModule\Classes;

use Nette\Bridges\ApplicationLatte\Template,
    Nette\Application\UI\ITemplateFactory,
    Nette\Application\LinkGenerator;

/**
 * Description of ModuleSearch
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ModuleSearch {
    
    protected $query;
    
    /**
     * @var Template
     */
    protected $template;
    
    /**
     * @var ITemplateFactory
     */
    protected $iTemplateFactory;
    
    /**
     * @var LinkGenerator
     */
    protected $linkGenerator;
    
    public function __construct(LinkGenerator $linkGenerator, ITemplateFactory $iTemplateFactory) {
        $this->iTemplateFactory = $iTemplateFactory;
        $this->linkGenerator = $linkGenerator;
        $this->prepareTemplate();
    }
    
    /**
     * Setup search template
     * Performs all actions to return what we found in this module
     * @param string $query
     */
    public function setup($query) {
        $this->setQuery($query);
        $this->setupTemplate();
    }
    
    /**
     * Creates template in current locaton to Blocks folder
     */
    private function prepareTemplate() {
        $template = $this->iTemplateFactory->createTemplate();
        $template->_control = $this->linkGenerator;
        $this->setTemplate($template);
    }
    
    
    /**
     * Tend to be overriden by descendant
     */
    protected function setupTemplate() {
        
    }

    public function getTemplate() {
        return $this->template;
    }
    
    protected function getQuery() {
        return $this->query;
    }

    protected function setQuery($query) {
        $this->query = $query;
    }

    protected function setTemplate($template) {
        $this->template = $template;
    }

    private function getEngine() {
        return $this->engine;
    }
    
}
