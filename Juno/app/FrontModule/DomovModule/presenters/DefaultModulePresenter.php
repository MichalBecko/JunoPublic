<?php

namespace Front\DomovModule\Presenters;

use Nette\Http\Request,
    App\BasePresenter,
    DefaultModule\Services\DirService,
    ClientModule\Services\ClientService,
    Nette\Caching\IStorage,
    CacheToken\CacheToken,
    FrontModule\Classes\DefaultValues;

/**
 * Base presenter for all application presenters.
 */
abstract class DefaultModulePresenter extends BasePresenter {
    
    /** @var Request @inject */
    public $request;
    
    /** @var DirService @inject */
    public $dirService;
    
    /** @var ClientService @inject */
    public $clientService;
    
    /** @var IStorage @inject */
    public $iStorage;
    
    public $langs;

    public function startup() {
        parent::startup();

        // WE DO NOT NEED FRONTEND
        $this->redirect(":Admin:Homepage:Homepage:login");
        
        $this->langs = DefaultValues::getLangs();
        
        $this->user->setupForFrontend();
    }
    
    public function beforeRender() {
        parent::beforeRender();
        
        // some basic variables we might want to use
        $this->template->url = $this->request->getUrl();
        $this->template->bower = $this->dirService->getBower();
        $this->template->langs = $this->langs;   
        $this->template->client = $this->clientService->getClient();

        $validationToken = new \Artexe\CacheToken\CacheToken($this->iStorage, "frontEndToken");
        $this->template->validationToken = $validationToken->getTimeStamp();
    }
    
    /**
     * Returns translated text by given UNIQUE ID
     * @param type $id
     * @return type
     */
    public function getText($id) {
        return $this->textService->getByUniqueIdAndLang($id, $this->locale);
    }
    
    /**
     * Logout current user
     * @return void
     */
    public function handleLogout() {
        $this->user->logout(TRUE);
        $this->redirect("this");
    }
    
}