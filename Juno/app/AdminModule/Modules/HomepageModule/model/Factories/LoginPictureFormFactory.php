<?php

namespace HomepageModule\Factories;

use HomepageModule\Entities\LoginPicture,
    HomePageModule\Services\LoginPictureService,
    MultimediaModule\Services\MultimediaService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    LogModule\Services\LogService,
    UserModule\Services\User,
    DefaultModule\Factories\TranslatedFormFactory;

/**
 * Description of LoginPictureFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class LoginPictureFormFactory {
    
    /** @var MultimediaService */
    public $multimediaService;

    /** @var IMultimediaSaver */
    public $iMultimediaSaver;
    
    /** @var LoginPictureService */
    public $loginPictureService;
    
    /** @var LogService */
    public $logService;
    
    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var User */
    public $user;
    
    public function __construct(MultimediaService $multimediaService, IMultimediaSaver $iMultimediaSaver, LoginPictureService $loginPictureService, 
            LogService $logService, TranslatedFormFactory $translatedFormFactory, User $user) {
        $this->multimediaService = $multimediaService;
        $this->iMultimediaSaver = $iMultimediaSaver;
        $this->loginPictureService = $loginPictureService;
        $this->logService = $logService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->user = $user;
    }
    
    public function getForm() {

        $form = $this->translatedFormFactory->create();

        $form->addUpload("multimedia", "Obrázok");

        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "Pridať obrázok");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add($form) {
        $v = $form->getValues();
        
        $multimediaSaver = $this->iMultimediaSaver->create($v["multimedia"]);
        
	if ($multimediaSaver->isImage()) {
	    $multimedia = $multimediaSaver->saveAsImage("multimedia/loginPictures/");
        
            $loginPicture = new LoginPicture();
            $loginPicture->setMultimedia($multimedia);

            $this->loginPictureService->insert($loginPicture);
	}
        
    }

}
