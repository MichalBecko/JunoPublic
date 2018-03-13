<?php

namespace LogModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    LogModule\Services\LogService,
    Nette\Application\UI\Form,
    DefaultModule\Classes\Functions,
    Nette\Utils\Json,
    DefaultModule\Factories\DatagridFactory;
use LogModule\Classes\LogValues;

/**
 * Description of LogPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LogPresenter extends DefaultPresenter {
    
    /**
     * @var LogService @inject
     */
    public $logService;
    
    /** @var DatagridFactory @inject */
    public $datagridFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Logy");
        $this->setMenuitemId(4);
    }
    
    public function actionDefault() {
    }
    
    public function createComponentLogGrid($name) {

        $qb = $this->logService->getAllAsQb();
        $grid = $this->datagridFactory->createDatagrid($this, $qb, $name);

        $grid->addColumnText("description", "Description");

        $grid->addColumnText("action", "Action")->setSortable()
            ->setRenderer(function($item) {
                if (array_key_exists($item->getAction(), LogValues::getLogValues())) {
                    return LogValues::getLogValues()[$item->getAction()];
                } else {
                    return "-";
                }
            });
        $grid->addColumnText("tab", "Tab")->setSortable()
            ->setRenderer(function($item) {
                if (array_key_exists($item->getTab(), LogValues::getLogValues())) {
                    return LogValues::getLogValues()[$item->getTab()];
                } else {
                    return "-";
                }
            });
        $grid->addColumnText("privilege", "Permission")->setSortable()
            ->setRenderer(function($item) {
                if (array_key_exists($item->getPrivilege(), \Privilege::getPrivilegesForProjects())) {
                    return \Privilege::getPrivilegesForProjects()[$item->getPrivilege()];
                } else {
                    return "-";
                }
            });
        $grid->addColumnText("creator", "User")
            ->setRenderer(function($item) {
                return $item->getCreator()->getFullName();
            })
            ->setSortable();
        $grid->addColumnText("ip", "IP");
        $grid->addColumnDateTime("createDate", "Dátum vloženia");


        $actions = [
            1 => "ACTION_INSERT",
            2 => "ACTION_UPDATE",
            3 => "ACTION_DELETE"
        ];
        $tabs = [
            4 => "TAB_PROJECT",
            5 => "TAB_DASHBOARDS",
            6 => "TAB_TEST_ANALYSES",
            7 => "TAB_TEST_PLAN",
            8 => "TAB_TEST_EXECUTION",
            9 => "TAB_ISSUES",
            10 => "TAB_SETTINGS"
        ];
        $grid->addFilterSelect("action", "Action", ["" => "-"] + $actions);
        $grid->addFilterSelect("tab", "Tab", ["" => "-"] + $tabs);
        $grid->addFilterSelect("privilege", "Permission", ["" => "-"] + \Privilege::getPrivilegesForProjects());
        $grid->addFilterSelect("creator", "User",
            ["" => "-"] + Functions::formatToPairs( "id", ["name", "surname"], $this->userService->getAllDesc()));
        $grid->addFilterDateRange("createDate", "Dátum vloženia");

        $grid->setOuterFilterRendering();
        
        return $grid;
        
    }
    
}
