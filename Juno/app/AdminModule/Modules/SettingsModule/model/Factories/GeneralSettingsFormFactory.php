<?php

namespace SettingsModule\Factories;

use DefaultModule\Interfaces\IFormFactory,
    LogModule\Services\LogService,
    LogModule\Entities\Log,
    UserModule\Services\User,
    DefaultModule\Services\HydratorService,
    Nette\Application\UI\Form,
    DefaultModule\Factories\TranslatedFormFactory,
    ClientModule\Services\ClientService,
    MultimediaModule\Interfaces\IMultimediaSaver,
    Nette\Utils\Image,
    DefaultModule\Classes\Functions;

/**
 * Description of generalSettingsFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class GeneralSettingsFormFactory implements IFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;
    
    /** @var ClientService */
    public $clientService;
    
    /** @var IMultimediaSaver */
    public $iMultimediaSaver;
    
    public function __construct(LogService $logService, User $user, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, ClientService $clientService, IMultimediaSaver $iMultimediaSaver) {
        $this->logService = $logService;
        $this->user = $user;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->clientService = $clientService;
        $this->iMultimediaSaver = $iMultimediaSaver;
    }

    public function getForm() {

        $form = $this->translatedFormFactory->create();
        
        $form->addText("name", "is.default.name")
            ->setRequired();
        
        $form->addText("eMail", "is.default.mail")
            ->setRequired(false)
            ->addRule($form::EMAIL, "Neplatný e-mail");
        
        $form->addText("telephoneNumber", "is.default.phoneNumber")
            ->setRequired();
        
        $address = $form->addContainer("address");
            $address->addText("street", "is.settings.street")
                ->setRequired();
            $address->addText("city", "is.settings.city")
                ->setRequired();
            $address->addText("psc", "is.settings.psc")
                ->setRequired();
            $address->addText("state", "is.settings.state")
                ->setRequired();
        
        $billingAddress = $form->addContainer("billingAddress");
            $billingAddress->addText("companyName", "is.settings.companyName")
                ->setRequired();
            $billingAddress->addText("street", "is.settings.street")
                ->setRequired();
            $billingAddress->addText("city", "is.settings.city")
                ->setRequired();
            $billingAddress->addText("psc", "is.settings.psc")
                ->setRequired();
            $billingAddress->addText("state", "is.settings.state")
                ->setRequired();
            $billingAddress->addText("ico", "is.settings.ico")
                ->setRequired();
            $billingAddress->addText("dic", "is.settings.dic")
                ->setRequired();
            $billingAddress->addText("icdph", "is.settings.icdph")
                ->setRequired();
            
        $multimedia = $form->addContainer("multimedia");
            $multimedia->addUpload("multimedia", "is.default.logo");
            $multimedia->addUpload("favicon", "is.default.favicon");

        return $form;
    }

    public function createEditForm($id) {

        $defaults = $this->clientService->getClient()->toArray();

        $form = $this->getForm();
        $form->addHidden("id");
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "edit"];

        $form->setDefaults($defaults);

        return $form;
    }

    public function edit(Form $form) {
        $v = $form->getValues(TRUE);

        $client = $this->hydratorService->fromArray($v, $this->clientService->getClient(), ["multimedia"]);
        
        $multimediaUpload = $v["multimedia"]["multimedia"];
        if ($multimediaUpload->isOk()) {

            Functions::deleteFile($client->getMultimedia());

            $multimediaSaver = $this->iMultimediaSaver->create($multimediaUpload);
            $multimedia = $multimediaSaver->saveAsImage("multimedia/client/", 170, 40, NULL, Image::SHRINK_ONLY | Image::FIT);

            $client->setMultimedia($multimedia);
        }

        $faviconUpload = $v["multimedia"]["favicon"];
        if ($faviconUpload->isOk()) {

            Functions::deleteFile($client->getFavicon());

            $multimediaSaver = $this->iMultimediaSaver->create($faviconUpload);
            $favicon = $multimediaSaver->saveAsImage("multimedia/client/", 32, 32, NULL, Image::FIT);

            $client->setFavicon($favicon);
        }

        $this->clientService->update($client);
    }
    
    public function createAddForm() {
    }

    public function add(Form $form) {
    }

}
