<?php

namespace HelpModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    SettingsModule\Services\SettingsService,
    Nette\Application\UI\Form,
    Joseki\Application\Responses\PdfResponse;

/**
 * Description of HelpPresenter
 *
 * @author Vladino
 */
class HelpPresenter extends DefaultPresenter {
    
    /** @var SettingsService @inject */
    public $settingsService;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Nápoveda");
        $this->setMenuitemId(9);
    }
    
    /**
     * Creates form for editing help module
     * @return Form
     */
    public function createComponentEditHelp() {

        $form = new Form();
        $form->addTextArea("description", null, null, 20)->setDefaultValue($this->settingsService->findOneByOption("help")->getDescription());

        $form->addSubmit("submit", "");

        $form->onSuccess[] = [$this, "editHelp"];

        return $form;
    }
    
    public function editHelp(Form $form) {
        $v = $form->getValues();

        $settings = $this->settingsService->findOneByOption("help");
        $settings->setDescription($v["description"]);

        $this->settingsService->update($settings);
        
        $this->flashMessage("is.help.sucEdited", "success");
        $this->redirect(":Admin:Help:Help:default");
	
    }
    
    public function actionDefault() {
        $this->addBreadCrumb("Upraviť nápovedu");
        $this->setMenuitemId(9);

        $this->template->help = $this->settingsService->findOneByOption("help");
    }
    
    public function actionEditHelp() {
        $this->addBreadCrumb("is.help.editHelp");
    }
    
    /**
     * Generate and returns help pdf file
     */
    public function handleGenerateHelpAsPdf() {
	
        $template = $this->createTemplate();
        $template->setFile($this->dirService->getPdfDir()."/help.latte");
        $template->description = $this->settingsService->findOneByOption("help")->getDescription();

        $pdf = new PdfResponse($template);
        $pdf->documentTitle = "Nápoveda ". $this->appSetupService->informationSystemName;
        $pdf->documentAuthor = $this->appSetupService->developer["name"];
        $this->sendResponse($pdf);
	
    }
    
    public function actionInformation() {
        $this->addBreadCrumb("Systém");
        $this->setMenuitemId(10);
    }
    
}
