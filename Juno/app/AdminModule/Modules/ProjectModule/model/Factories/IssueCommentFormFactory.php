<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use DefaultModule\Services\SimpleEntityService;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use UserModule\Services\User;

/**
 * Description of ProjectFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class IssueCommentFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;

    /** @var  SimpleEntityService */
    public $simpleEntityService;

    /** @var  Context */
    public $database;

    private $project;

    private $presenter;

    /**
     * IssueCommentFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param HydratorService $hydratorService
     * @param TranslatedFormFactory $translatedFormFactory
     * @param SimpleEntityService $simpleEntityService
     * @param Context $database
     */
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, SimpleEntityService $simpleEntityService, Context $database)
    {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->simpleEntityService = $simpleEntityService;
        $this->database = $database;
    }

    public function getForm() {
        $form = $this->translatedFormFactory->create();


        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);



    }

    public function createEditForm() {

        $form = $this->getForm();

        $form->addHidden("id", $issueID);
        $form->onSuccess[] = [$this, "editForm"];

        return $form;
    }

    public function editForm(Form $form) {
        $v = $form->getValues();




    }

}
