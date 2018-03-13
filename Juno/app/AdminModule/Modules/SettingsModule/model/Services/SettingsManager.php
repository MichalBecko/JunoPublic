<?php

namespace SettingsModule\Services;

use Nette\Object,
    HomepageModule\Interfaces\ISettingsControlFactory as ILoginSettingsControlFactory,
    MailerModule\Interfaces\ISettingsControlFactory as IMailerSettingsControlFactory,
    ProjectModule\Interfaces\IRoleSettingsControlFactory;

/**
 * Description of SettingsManager
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class SettingsManager extends Object {
    
    /** @var ILoginSettingsControlFactory  */
    public $iLoginSettingsControlFactory;
    
    /** @var IMailerSettingsControlFactory  */
    public $iMailerSettingsControlFactory;
    
    /** @var IRoleSettingsControlFactory */
    public $iRoleSettingsControlFactory;
    
    public $settingsControls;
    
    public $settingsButtons;
    
    public function __construct(IMailerSettingsControlFactory $iMailerSettingsControlFactory,  
        ILoginSettingsControlFactory $iLoginSettingsControlFactory,
        IRoleSettingsControlFactory $iRoleSettingsControlFactory) {
        $this->iLoginSettingsControlFactory = $iLoginSettingsControlFactory;
        $this->iMailerSettingsControlFactory = $iMailerSettingsControlFactory;
        $this->iRoleSettingsControlFactory = $iRoleSettingsControlFactory;
        
        $this->setupControls();
        $this->setupButtons();
    }

    private function setupControls() {
        $this->addSettingsControl("roleSettings", $this->iRoleSettingsControlFactory->create());
        $this->addSettingsControl("loginSettings", $this->iLoginSettingsControlFactory->create());
        $this->addSettingsControl("mailerSettings", $this->iMailerSettingsControlFactory->create());
    }
    
    private function setupButtons() {
        
        $this->settingsButtons["roleSettings"] = [
            "name" => "roleSettings",
            "text" => "Role"
        ];
        
        $this->settingsButtons["loginSettings"] = [
            "name" => "loginSettings",
            "text" => "Prihlásenie"
        ];
        
        $this->settingsButtons["mailerSettings"] = [
            "name" => "mailerSettings",
            "text" => "Mailer"
        ];
    }
    
    private function addSettingsControl($name, $form) {
        $this->settingsControls[$name] = $form;
    }
    
    public function getSettingsControlByName($name) {
        return $this->settingsControls[$name];
    }
    
    public function getSettingsButtons() {
        return $this->settingsButtons;
    }
    
}