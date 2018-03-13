<?php

namespace HomepageModule\Controls;

use Nette\Application\UI\Control,
    HomepageModule\Services\LoginPictureService,
    DefaultModule\Services\DirService,
    HomepageModule\Factories\LoginPictureFormFactory,
    DefaultModule\Classes\Functions;

/**
 * Description of Settings
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SettingsControl extends Control {
    
    /** @var LoginPictureService */
    public $loginPictureService;
    
    /** @var DirService */
    public $dirService;
    
    /** @var LoginPictureFormFactory */
    public $loginPictureFormFactory;
    
    public function __construct(LoginPictureService $loginPictureService, DirService $dirService, LoginPictureFormFactory $loginPictureFormFactory) {
        $this->loginPictureService = $loginPictureService;
        $this->dirService = $dirService;
        $this->loginPictureFormFactory = $loginPictureFormFactory;
    }
    
    public function render() {
    }
    
    public function renderContent() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/settings.latte');
        
        $multimedias = $this->loginPictureService->getAll();
        $template->blocksDir = $this->dirService->getBlocksDir();
        $template->multimedias = $multimedias;
        
        $template->render();
    }
    
    public function renderButtons() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/buttons.latte');
        
        $template->blocksDir = $this->dirService->getBlocksDir();
        
        $template->render();
    }
    
    public function createComponentLoginPictureForm() {
        $form = $this->loginPictureFormFactory->createAddForm();
        return $form;
    }
    
    public function handleDeleteLoginPicture($id) {

        $loginPicture = $this->loginPictureService->getById($id);
        Functions::deleteFile($loginPicture->getMultimedia());
        $this->loginPictureService->delete($loginPicture);
    }
    
}
