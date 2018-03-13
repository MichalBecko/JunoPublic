<?php

namespace DefaultModule\Factories;

use Nette,
    Nette\Application\UI\Form,
    Kdyby\Translation\Translator;

/**
 * Description of TranslatedFormFactory
 *
 * @author Vladino
 */
class TranslatedFormFactory extends Nette\Object {
    
    /**
     * @var Translator 
     */
    public $translator;
    
    public function __construct(Translator $translator) {
	$this->translator = $translator;
    }
    
    /**
     * Creates default form with already initialized translator
     * @return Form
     */
    public function create() {
	
	$form = new Form();
	$form->setTranslator($this->translator);
	return $form;
    }
    
}
