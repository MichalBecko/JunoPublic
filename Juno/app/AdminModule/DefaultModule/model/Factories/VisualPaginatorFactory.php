<?php

namespace DefaultModule\Factories;

use Nette\Object,
    IPub\VisualPaginator\Components\Control,
    DefaultModule\Services\DirService;

/**
 * Description of VisualPaginatorFactory
 * @author Vladimír Vráb <www.artexe.sk>
 */
class VisualPaginatorFactory extends Object {

    /** @var DirService */
    public $dirService;
    
    public function __construct(DirService $dirService) {
        $this->dirService = $dirService;
    }
    
    /**
     * Create items paginator
     * @return Control
     */
    public function createVisualPaginator() {
        
        $control = new Control;
        $control->setTemplateFile($this->dirService->getBlocksDir() . '/paginator.latte');
        $control->disableAjax();

        return $control;
    }

}