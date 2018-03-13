<?php

namespace SettingsModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    SettingsModule\Services\SettingsManager,
    Nette\Application\UI\Multiplier;
        
/**
 * Description of SpecificSettingsPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SpecificSettingsPresenter extends DefaultPresenter {
    
    /** @var SettingsManager @inject */
    public $settingsManager;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Špecifické nastavenia");
        $this->setMenuitemId(8);
    }
    
    public function actionDefault($id = NULL) {

        if (is_null($id)) {
            $activeControlName = "roleSettings";
        } else {
            $activeControlName = $id;
        }
        
        $this->template->activeControlName = $activeControlName;
        $this->template->settingsButtons = $this->settingsManager->getSettingsButtons();
    }
    
    public function handleChangeSettingsControl($newControlName) {
        $this->template->activeControlName = $newControlName;
        
        $this->redrawControl("settingsControlContent");        
        $this->redrawControl("settingsControlButtons");        
    }
    
    public function createComponentSettingsComponent() {
        
        $multiplier = new Multiplier(function($name) {
            $control = $this->settingsManager->getSettingsControlByName($name);
            return $control;
        });
        
        return $multiplier;
    }
    
}