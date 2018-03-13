<?php

namespace ProjectModule\Presenters;

use DefaultModule\Factories\DatagridFactory;
use DefaultModule\Presenters\DefaultPresenter;
use ProjectModule\Factories\ProjectFormFactory;
use ProjectModule\Services\ProjectService;

/**
 * Description of ProjectPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectPresenter extends DefaultPresenter {
    
    /** @var DatagridFactory @inject */ 
    public $datagridFactory;
    
    /** @var ProjectService @inject */
    public $projectService;
    
    /** @var ProjectFormFactory @inject */
    public $projectFormFactory;
    
    public function startup() {
        parent::startup();
        $this->setMenuitemId(2);
        $this->addBreadCrumb("Projekty", ":Admin:Project:Project:default");
    }
    
    public function createComponentProjectGrid($name) {
        
        $grid = $this->datagridFactory->createDatagrid($this, $this->projectService->getAllAsQb(), $name);
        
        $grid->addColumnText("name", "Názov projektu");
        
        $grid->addColumnText("creator", "Projekt vytvoril")
            ->setRenderer(function($item) {
                return $item->getCreator()->getFullName();
        });
        
        $grid->addColumnDateTime("createDate", "Dátum vytvorenia");
        
        $this->datagridFactory->addAction($grid, "ProjectPresenter", "ProjectModule/templates/Project");
        
        return $grid;
    }
    
    public function createComponentAddProjectForm() {
        $form = $this->projectFormFactory->createAddForm();
        $form->onSuccess[] = function() {
            $this->redirect("this");
        };
        return $form;
    }
    
    
}
