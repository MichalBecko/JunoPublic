<?php

namespace MultimediaModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    MultimediaModule\Services\Multimedia_folderService,
    MultimediaModule\Services\MultimediaService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    DefaultModule\Services\DirService,
    Nette\Application\UI\Form,
    MultimediaModule\Entities\Multimedia_folder,
    LogModule\Entities\Log,
    Nette\Application\Responses\FileResponse,
    DefaultModule\Factories\TranslatedFormFactory,
    DefaultModule\Classes\Functions;

/**
 * Description of MultimediaPresenter
 *
 * @author Vladino
 */

class MultimediaPresenter extends DefaultPresenter {
    
    /** @var Multimedia_folderService @inject */
    public $multimedia_folderService;
    
    /** @var MultimediaService @inject */
    public $multimediaService;
    
    /** @var IMultimediaSaver @inject */
    public $iMultimediaSaver;
    
    /** @var DirService @inject */
    public $dirService;
    
    /** @var TranslatedFormFactory @inject */
    public $translatedFormFactory;
    
    public function startup() {
        parent::startup();
        $this->setResource("multimedia");
        $this->addBreadCrumb("is.modulName.multimedia");
		$this->setMenuitemId(3);
    }
    
    /**
     * Creates component which allows creating folder to multimedia module
     * @return Form
     */
    public function createComponentAddFolder() {
	
	$form = $this->translatedFormFactory->create();
	$form->addText("name", "is.multimedia.folderName");
	$form->addSubmit("submit", "is.multimedia.addFolder");
	
	$form->onSuccess[] = [$this, "addFolder"];
	
	return $form;
    }
    
    public function addFolder(Form $form) {
	
	$v = $form->getValues();   
	
	$multimediaFolder = new Multimedia_folder();
	$multimediaFolder->setName($v["name"]);
	
	$this->multimedia_folderService->insert($multimediaFolder);
	
        $log = new Log();
        $log->setUser($this->user->getEntity());
        $log->setDescriptionAndEncode("is.multimedia.logFolderAdded", ["id" => $multimediaFolder->getId()]);
        $log->setResource("is.modulName.multimedia");
        $this->logService->insert($log); 
	
        $this->flashMessage("is.multimedia.sucFolderAdded", "success");
	$this->redirect(":Admin:Multimedia:Multimedia:default");
    }
    
    public function actionDefault() {
	$this->setNeededPrivilage("view");
	$this->template->multimediaFolders = $this->multimedia_folderService->getAll();
	
    }
    
    public function actionFolder($id) {
        $this->setNeededPrivilage("view");
	
        $folder = $this->multimedia_folderService->findById($id);
	$this->template->multimediaFolder = $folder;
	
	$this->template->multimedias = $this->multimediaService->getAllByMultimedia_folder_id($id);
	
	$this->template->isMultimediaOpened = false;
	$this->addBreadCrumb("is.multimedia.folder");
	$this->addBreadCrumb($folder->getName());
    }
    
    public function handleOpenMultimedia($id_mul) {
	
	$this->template->multimedia = $this->multimediaService->findById($id_mul);
	
	$this->template->isMultimediaOpened = true;
	
	if ($this->isAjax()) {
	    $this->redrawControl("openedMultimedia");
	}
	
    }
    
    public function handleDownloadMultimedia($id_mul) {
	
	$multimedia = $this->multimediaService->findById($id_mul);
	
	$fileResponse = new FileResponse($multimedia->getPath());
	$this->sendResponse($fileResponse);
    }
    
    /**
     * Deletes multimedia by given id
     * @param id $id_mul
     */
    public function handleDeleteMultimedia($id_mul) {
	$this->setNeededPrivilage("delete");
	$multimedia = $this->multimediaService->findById($id_mul);
        Functions::deleteFile($multimedia);
	$this->multimediaService->delete($multimedia);
	
	$log = new Log();
        $log->setUser($this->user->getEntity());
        $log->setDescriptionAndEncode("is.multimedia.logMultimediaDeleted", ["id" =>  $id_mul]);
        $log->setResource("is.modulName.multimedia");
        $this->logService->insert($log);
	
        $this->flashMessage("is.multimedia.sucMultimediaDeleted", "success");
	$this->redirect("Multimedia:folder", $this->getParameter("id"));
    }
    
    /**
     * 
     * @return Form
     */
    public function createComponentAddMultimedia() {
	
	$id = $this->getParameter("id");
	
	$form = $this->translatedFormFactory->create();
	$form->addUpload("file", "is.default.chooseFile");
	$form->addSubmit("submit", "");
	$form->addHidden("id", $id);
	
	$form->onSuccess[] = [$this, "addMultimedia"];
	
	return $form;
	
    }
    
    public function addMultimedia(Form $form) {
	
	$v = $form->getValues();
	
	if ($v["file"]->isOk()) {
	
            $multimediaSaver = $this->iMultimediaSaver->create($v["file"]);

            if ($multimediaSaver->isImage()) {
                $multimedia = $multimediaSaver->saveAsImage("multimedia/multimedias/");
            } else {
                $multimedia = $multimediaSaver->saveAsFile("multimedia/multimedias/");
            }

            $multimedia_folder = $this->multimedia_folderService->findById($v["id"]);

            $multimedia->setMultimedia_folder($multimedia_folder);

            $this->multimediaService->insert($multimedia);

            $log = new Log();
            $log->setUser($this->user->getEntity());
            $log->setDescriptionAndEncode("is.multimedia.logMultimediaAdded", ["id" => $multimedia->getId()]);
            $log->setResource("is.modulName.multimedia");
            $this->logService->insert($log);
	} 
	
        $this->flashMessage("is.multimedia.sucMultimediaAdded", "success");
	$this->redirect(":Admin:Multimedia:Multimedia:folder", $v["id"]);
    }
    
    /**
     * Deletes multimedia folder
     * @param int $id
     */
    public function handleDeleteMultimediaFolder($id) {
        $this->setNeededPrivilage("delete");
        $multimedias = $this->multimediaService->getAllByMultimedia_folder_id($id);
	
        foreach ($multimedias as $m) {
            Functions::deleteFile($m);
        }
        
        $multimedia_folder = $this->multimedia_folderService->findById($id);
        
        $this->multimedia_folderService->delete($multimedia_folder);
        
        $log = new Log();
        $log->setUser($this->user->getEntity());
        $log->setDescriptionAndEncode("is.multimedia.logFolderDeleted", ["id" => $id]);
        $log->setResource("is.modulName.multimedia");
        $this->logService->insert($log); 
        
        $this->flashMessage("is.multimedia.sucFolderDeleted", "success");
        $this->redirect(":Admin:Multimedia:Multimedia:");
        
    }
    
}
