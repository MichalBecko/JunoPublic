<?php

namespace DefaultModule\Factories;

use Nette\Object,
    Ublaboo\DataGrid\DataGrid,
    Kdyby\Translation\ITranslator,
    DefaultModule\Services\DirService;

/**
 * Description of DatagridFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DatagridFactory extends Object  {
    
    /** @var ITranslator */
    public $translator;
    
    /** @var DirService */
    public $dirService;
    
    public function __construct(ITranslator $translator, DirService $dirService) {
        $this->translator = $translator;
        $this->dirService = $dirService;
    }
    
    public function createDatagrid($presenter, $data, $name = null) {
        
        $grid = new DataGrid($presenter, $name);
        // setup
        $grid->setTranslator($this->translator);
        $grid->setDataSource($data);
        $grid->setStrictSessionFilterValues(FALSE);
        $grid->setTemplateFile($this->dirService->getBlocksDir() . "/datagridTemplate.latte");
        $grid->setDefaultSort(["id" => "DESC"]);
        $grid->setDefaultPerPage(10);
        $grid->setColumnsHideable();
        
        // ID is everywhere
        $grid->addColumnText("id", "ID")
            ->setSortable();
        
        return $grid;
    }
    
    public function addAction($grid, $presenterName, $templateDir = NULL) {
        $column = $grid->addColumnText("action", "is.default.action")
            ->setAlign("right");
        
        if (is_null($templateDir)) {
            $column->setTemplate($this->dirService->getModulesDir()."/".$presenterName.'Module/templates/Blocks/action.latte', ["presenter" => $grid->getPresenter()]);
        } else {
            $column->setTemplate($this->dirService->getModulesDir().'/'. $templateDir.'/Blocks/action.latte', ["presenter" => $grid->getPresenter()]);
        }
    }
    
}
