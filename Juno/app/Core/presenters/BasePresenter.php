<?php

namespace App;

use Nette\Application\UI\Presenter,
    Kdyby\Translation\Translator,
    UserModule\Services\User;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {
    
    /** @persistent */
    public $locale;

    /** @var Translator @inject */
    public $translator;
    
    /** @var User @inject */
    public $user;
    
    public function startup() {
	parent::startup();
        
	// $locale is current language
	$this->template->locale = $this->locale;
    }

}