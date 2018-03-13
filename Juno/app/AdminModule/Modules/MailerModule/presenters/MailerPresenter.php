<?php

namespace MailerModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    MailerModule\Services\MailerService,
    ClientModule\Services\ClientService,
    LogModule\Entities\Log,
    ContactModule\Services\ContactService,
    DefaultModule\Classes\Functions,
    Nette\Utils\Json,
    MailerModule\Services\MailerDefaultService,
    MailerModule\Factories\MailerFormFactory,
    DefaultModule\Factories\DatagridFactory,
    Nette\Application\Responses\FileResponse;

/**
 * Description of MailPresenter
 *
 * @author Vladino
 */
class MailerPresenter extends DefaultPresenter {
    
    /**
     * @var MailerService @inject
     */
    public $mailerService;
    
    /**
     * @var ClientService @inject 
     */
    public $clientService;
    
    /**
     * @var ContactService
     */
    public $contactService;
    
    /**
     * @var MailerDefaultService @inject
     */
    public $mailerDefaultService;
    
    /** 
     * @var MailerFormFactory @inject
     */
    public $mailerFormFactory;
    
    /** @var DatagridFactory @inject */
    public $datagridFactory;
    
    public $showFilter;
    
    public function startup() {
        parent::startup();
        $this->setResource("mailer");
        $this->addBreadCrumb("is.modulName.mailer");
        $this->setMenuitemId(1);
    }
    
    public function actionDefault($showFilter) {
        $this->setNeededPrivilage("view");     
        
        $this->showFilter = ($showFilter == FALSE) ? FALSE : TRUE;
    }
    
    public function createComponentMailerDatagrid($name) {
        
        $grid = $this->datagridFactory->createDatagrid($this, $this->mailerService->getAllAsQB(), $name);
        
        $grid->addColumnText("recipient", "is.mailer.recipient")
                ->setSortable();
        $grid->addColumnText("subject", "is.mailer.subject")
                ->setSortable();
        $grid->addColumnDateTime("sentDate", "is.mailer.sentDate")
                ->setFormat("d.m.Y H:i")
                ->setSortable();
        
        if ($this->showFilter) {
            $grid->addFilterText("recipient", "is.mailer.recipient");
            $grid->addFilterText("subject", "is.mailer.subject");
            $grid->addFilterDateRange("sentDate", "is.mailer.sentDate")
                    ->addAttribute("class", "datepicker form-control input-sm");
            
            $grid->setOuterFilterRendering(TRUE);
            $grid->addToolbarButton("default", "", ["showFilter" => FALSE])
                ->setIcon("filter");
        } else {
            $grid->addToolbarButton("default", "", ["showFilter" => TRUE])
                ->setIcon("filter");
        }
        
        $this->datagridFactory->addAction($grid, "Mailer");
        return $grid;
    }
    
    public function handleDeleteMail($id) {
        $this->setNeededPrivilage("delete");
        
        $mail = $this->mailerService->getById($id);
        foreach ($mail->getAttachments() as $attachment) {
            Functions::deleteFile($attachment->getMultimedia());
        }
        
        $this->mailerService->delete($mail);
        
        $log = new Log();
        $log->setUser($this->user->getEntity());
        $log->setDescriptionAndEncode("is.mailer.deletedMail", ["id" => $id]);
        $log->setResource("is.modulName.mailer");
        $this->logService->insert($log);
        
        $this->flashMessage("is.mailer.sucDeleted", "success");
        $this->redirect(":Admin:Mailer:Mailer:default");
    }
    
    public function actionNewMail() {
        $this->setNeededPrivilage("add");
        $this->addBreadCrumb("is.mailer.write");
        
        $contactMails = Json::encode(Functions::removeEmptyValues(Functions::formatToPairs(NULL, "mail", $this->contactService->getAll())));
        $this->template->contactMails = $contactMails;
        
        $mailerDefaults = $this->mailerDefaultService->getAll();
        $this->template->mailerDefaults = $mailerDefaults;
    }
    
    public function createComponentNewMail() {
        
        $form = $this->mailerFormFactory->createAddForm();
        $form->onSuccess[] = function() {
            $this->flashMessage("is.mailer.sucSent", "success");
            $this->redirect(":Admin:Mailer:Mailer:default");
        };
        return $form;
    }
    
    public function actionShow($id) {
        $this->setNeededPrivilage("view");
        $this->addBreadCrumb("is.mailer.showMail");
        $this->template->mail = $this->mailerService->getById($id);
    }

    public function handleDownloadAttachment($path) {
        
        $fileResponse = new FileResponse($path);
        $this->sendResponse($fileResponse);
    }
    
}
