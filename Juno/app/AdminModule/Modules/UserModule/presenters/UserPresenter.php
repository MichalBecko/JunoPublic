<?php

namespace UserModule\Presenters;

use DefaultModule\Factories\DatagridFactory;
use DefaultModule\Presenters\DefaultPresenter,
    UserModule\Services\UserService,
    UserModule\Factories\UserFormFactory;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use UserModule\Classes\FakeSessionIdentity;

/**
 * Description of UserPresenter
 *
 * @author Vladino
 */
class UserPresenter extends DefaultPresenter {
    
    /** @var UserService @inject */
    public $userService;
    
    /** @var UserFormFactory @inject */
    public $userFormFactory;

    /** @var  DatagridFactory @inject */
    public $datagridFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Užívatelia");
        $this->setMenuitemId(3);
    }
    
    public function actionDefault() {
        $this->template->users = $this->userService->getAllDesc();
    }
    
    public function actionAddUser() {
        $this->addBreadCrumb("Pridať užívateľa");
    }
    
    public function actionEditUser($id) {
        $this->addBreadCrumb("Upraviť užívateľa");
        
	    $this->template->id = $id;
    }


    public function createComponentUserDatagrid($name) {

        $qb = $this->userService->getAllAsQb();

        if (!$this->isAllowed(\Privilege::USER_ARCHIVE)) {
            $qb->where("u.archive = 0");
        }

        $grid = $this->datagridFactory->createDatagrid($this, $qb, $name);

        $grid->addColumnText("name", "Meno")
            ->setSortable();
        $grid->addColumnText("surname", "Priezvisko")
            ->setSortable();
        $grid->addColumnText("eMail", "E-mail")
            ->setSortable();
        $grid->addColumnText("superAdmin", "Super admin")
            ->setSortable()
            ->setRenderer(function($item) {
                if ($item->superAdmin == 1) {
                    return "<span class='fa fa-check'></span>";
                } else {
                    return "<span class='fa fa-times'></span>";
                }
            })->setTemplateEscaping(FALSE);
        if ($this->isAllowed(\Privilege::USER_ARCHIVE)) {
            $grid->addColumnText("archive", "Archivovaný")
                ->setSortable()
                ->setRenderer(function($item) {
                    if ($item->archive == 1) {
                        return "<span class='fa fa-check'></span>";
                    } else {
                        return "<span class='fa fa-times'></span>";
                    }
                })->setTemplateEscaping(FALSE);
        }

        $grid->addColumnDateTime("date", "Dátum vytvorenia")
            ->setSortable();

        $grid->setRowCallback(function($item, $tr) {
            if ($item->archive == 1) {
                $tr->addClass("tr-opacitated");
            }
        });

        $this->datagridFactory->addAction($grid,"UserPresenter", "UserModule/templates/User");

        return $grid;
    }

    public function handleDeleteUser($id) {

        if ($this->user->getId() != $id) {
        
            $user = $this->userService->getOneById($id);
            $this->userService->delete($user);

            // HERE GOES LOG (smazat)
            $log = Log::create(LogValues::ACTION_DELETE, LogValues::TAB_SETTINGS);
            $log->setDescription("Smazan uživatel s ID ".$id);
            $this->logService->insert($log);

            $this->flashMessage("is.user.sucDeleted", "success");
            $this->redirect(":Admin:User:User:default");
        } else {
            $this->flashMessage("is.user.unableDelete", "danger");
            $this->redirect(":Admin:User:User:default");
        }
    }
    
    public function createComponentAddUser() {
	
        $form = $this->userFormFactory->createAddForm();
            $form->onSuccess[] = function() {
                $this->flashMessage("is.user.sucAdded", "success");
                $this->redirect(":Admin:User:User:default");
            };

        return $form;
    }
    
    public function createComponentEditUser() {
        
        $form = $this->userFormFactory->createEditForm($this->getParameter("id"));
        $form->onSuccess[] = function() {
            $this->flashMessage("is.user.sucEdited", "success");
            $this->redirect(":Admin:User:User:editUser", $this->getParameter("id"));  
        };
        
        return $form;
    }
    
    public function handleLoginAsSomebody($userID) {

        // send to cookie that i am logged as somebody and insert who i was as origin
        $session = $this->getSession()->getSection("loginAsSomebody");
        $session->fakeIdentity = new FakeSessionIdentity($this->user->id, $this->user->getEntity()->getFullName());

        $this->user->loginWithoutAuthorization($userID);
        
        $this->flashMessage("Úspešne prehlásený");
        $this->redirect(":Admin:Homepage:Homepage:");
    }

    public function handleArchiveUser($userID, $val) {

        $user = $this->userService->getOneById($userID);
        $user->archive = $val;

        $this->userService->update($user);

        // HERE GOES LOG (archivovat)
        $log = Log::create(LogValues::ACTION_UPDATE, LogValues::TAB_SETTINGS);
        $log->setDescription("Změna archivace uživatele s ID ".$userID);
        $this->logService->insert($log);

        $this->flashMessage("Užívateľ bol úspešne zmenený");
        $this->redirect("this");
    }
    
}
