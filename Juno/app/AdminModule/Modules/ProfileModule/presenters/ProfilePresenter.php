<?php

namespace ProfileModule\Presenters;

use DefaultModule\Factories\DatagridFactory;
use DefaultModule\Presenters\DefaultPresenter;
use Functions\Functions;
use LogModule\Classes\LogValues;
use LogModule\Services\LogService;
use Nette\Utils\Json;
use ProfileModule\Factories\TicketFormFactory;
use ProfileModule\Factories\UpdateProfileFormFactory;

/**
 * Description of ProfilePresenter
 *
 * @author Vladino
 */ 
class ProfilePresenter extends DefaultPresenter {
    
    /** @var UpdateProfileFormFactory @inject */
    public $updateProfileFormFactory;
    
    /** @var LogService @inject */
    public $logService;
    
    /** @var TicketFormFactory @inject */
    public $ticketFormFactory;

    /** @var  DatagridFactory @inject */
    public $datagridFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Profil");
    }
    
    public function actionDefault() {
        $this->addBreadCrumb("Môj profil");
    }
    
    public function actionLogs() {
        $this->addBreadCrumb("Moje logy");
    }

    public function createComponentLogGrid($name) {

        $qb = $this->logService->getAllAsQb()
            ->where("L.creator = :creator")
            ->setParameter("creator", $this->user->getEntity());
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
        $grid->addFilterDateRange("createDate", "Dátum vloženia");

        $grid->setOuterFilterRendering();

        return $grid;
    }
    
    public function createComponentUpdateProfileForm() {
	
        $form = $this->updateProfileFormFactory->create();
        $form->onSuccess[] = function() {
            
	    $this->flashMessage("is.profile.sucEdited", "success");
        $this->redirect(":Admin:Profile:Profile:default");
	};
	
	return $form;
	
    }
    
    public function actionAddTicket() {
        $this->addBreadCrumb("Napísať tiket");
    }
    
    public function createComponentAddTicketForm() {
        $form = $this->ticketFormFactory->createAddForm();
        $form->onSuccess[] = function() {
            $this->flashMessage("Tiket bol úspešne odoslaný. Ďakujeme!", "success");
            $this->redirect(":Admin:Homepage:Homepage:default");
        };
        $form->onError[] = function() {
            $this->flashMessage("Prosím dodržte správnu veľkosť vaších jednotlivých príloh", "danger");
            $this->redirect("this");
        };    
        return $form;        
    }
    
}
