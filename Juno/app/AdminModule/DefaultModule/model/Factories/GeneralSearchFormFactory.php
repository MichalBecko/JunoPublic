<?php

namespace DefaultModule\Factories;

use UserModule\Services\User,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory;

/**
 * Description of SearchFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class GeneralSearchFormFactory {

    /** @var User */
    public $user;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    public $presenter;
    
    public function __construct(User $user, TranslatedFormFactory $translatedFormFactory) {
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addText("name")->setAttribute("placeholder", "Hľadať");

        return $form;
    }

    public function createAddForm($presenter) {

        $this->presenter = $presenter;
        $query = $presenter->getParameter("query");
        
        $form = $this->getForm();
        
        // we set default if we have it
        if (!is_null($query)) {
            $form["name"]->setDefaultValue($query);
        }
        
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);        
        
        $this->presenter->redirect(":Admin:Homepage:Search:default", ["query" => $v["name"]]);
    }

}
