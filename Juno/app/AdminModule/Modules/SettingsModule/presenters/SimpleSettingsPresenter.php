<?php

namespace SettingsModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    SettingsModule\Factories\GeneralSettingsFormFactory;

/**
 * Description of SimplerSettingsPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SimpleSettingsPresenter extends DefaultPresenter {
   
    /** @var GeneralSettingsFormFactory @inject */
    public $generalSettingsFormFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("is.modulName.settings");
        $this->setMenuitemId(7);
    }
    
    public function actionDefault() {
        $this->addBreadCrumb("is.settings.generalSettings");
        $this->setMenuitemId(7);
    }
    
    /**
     * Creates settings form for editing and showing basic information about orderer and supplier
     * @return Form
     */
    public function createComponentSettingsForm() {
        
	$form = $this->generalSettingsFormFactory->createEditForm(NULL);
        $form->onSuccess[] = function() {
            $this->flashMessage("is.settings.sucEdited", "success");
            $this->redirect(":Admin:Settings:SimpleSettings:default");
        };
	return $form;
    }
    
}
