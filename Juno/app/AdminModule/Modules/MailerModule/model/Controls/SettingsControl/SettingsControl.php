<?php

namespace MailerModule\Controls;

use Nette\Application\UI\Control,
    DefaultModule\Services\DirService,
    MailerModule\Services\MailerDefaultService,
    MailerModule\Factories\MailerSettingsFormFactory,
    MailerModule\Factories\MailerDefaultFormFactory,
    FormInputRenderer\Controls\Renderer,
    Nette\Application\UI\Multiplier;

/**
 * Description of Settings
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SettingsControl extends Control {
    
    /** @var MailerDefaultService */
    public $mailerDefaultService;
    
    /** @var MailerSettingsFormFactory */
    public $mailerSettingsFormFactory;
    
    /** @var MailerDefaultFormFactory */
    public $mailerDefaultFormFactory;
    
    /** @var DirService */
    public $dirService;
    
    /** @persistent */
    public $locale;
    
    public function __construct(MailerDefaultService $mailerDefaultService, MailerSettingsFormFactory $mailerSettingsFormFactory, MailerDefaultFormFactory $mailerDefaultFormFactory, DirService $dirService) {
        $this->mailerDefaultService = $mailerDefaultService;
        $this->mailerSettingsFormFactory = $mailerSettingsFormFactory;
        $this->mailerDefaultFormFactory = $mailerDefaultFormFactory;
        $this->dirService = $dirService;
    }
    
    public function render() {
    }
    
    public function renderContent() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/settings.latte');
        
        $this->template->mailerDefaults = $this->mailerDefaultService->getAll();
        $template->blocksDir = $this->dirService->getBlocksDir();
        $this->template->locale = $this->presenter->locale;
        
        $template->render();
    }
    
    public function renderButtons() {
        $template = $this->template;
        $template->setFile(__DIR__ . '/buttons.latte');
        
        $template->blocksDir = $this->dirService->getBlocksDir();
        
        $template->render();
    }
    
    public function handleEditMailerDefault($mailerDefaultId) {
        $template = $this->template;
        
        $template->isMailerDefaultOpened = TRUE;
        $template->mailerDefault = $this->mailerDefaultService->getById($mailerDefaultId);
        
        $this->presenter->redrawControl("settingsControlContent");
        $this->redrawControl("openedMailer");
    }
    
    public function createComponentAddMailerDefaultForm() {
        
        $form = $this->mailerDefaultFormFactory->createAddForm();
        return $form;
    }
    
    public function handleDeleteMailerDefault($mailerDefaultId) {
        
        $mailerDefault = $this->mailerDefaultService->getById($mailerDefaultId);
        $this->mailerDefaultService->delete($mailerDefault);
        
//        $log = new Log();
//        $log->setUser($this->user->getEntity());
//        $log->setDescription("Vymazal šablónu s ID #".$mailerDefaultId);
//        $log->setResource($this->getResource());
//        $this->logService->insert($log);
//        
//        $this->flashMessage("Šablóna bola úspešne vymazaná", "success");
//        $this->redirect(":Admin:Settings:Settings:specific#mailer");
    }
    
    public function createComponentEditMailerDefaultForm() {
        
        $that = $this;
        $multiplier = new Multiplier(function($id) use($that) {
            
            $form = $that->mailerDefaultFormFactory->createEditForm($id);
            return $form;
            
        });        
        return $multiplier;
    }
    
    public function createComponentEditMailerSettings() {
        
        $form = $this->mailerSettingsFormFactory->createAddForm();
        return $form;
    }
    
    /**
     * Renders all input forms in my way
     * @return Renderer
     */
    public function createComponentRenderFormInput() {
        $control = new Renderer();
        return $control;
    }
    
}
