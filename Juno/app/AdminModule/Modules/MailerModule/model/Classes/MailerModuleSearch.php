<?php

namespace MailerModule\Classes;

use DefaultModule\Classes\ModuleSearch,
    MailerModule\Services\MailerService,
    Nette\Application\UI\ITemplateFactory,
    Nette\Application\LinkGenerator;

/**
 * Description of MailerModuleSearch
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MailerModuleSearch extends ModuleSearch {
    
    /** @var MailerService */
    public $mailerService;
    
    public function __construct(MailerService $mailerService, LinkGenerator $linkGenerator, ITemplateFactory $iTemplateFactory) {
        parent::__construct($linkGenerator, $iTemplateFactory);
        $this->mailerService = $mailerService;
    }
    
    public function setupTemplate() {
        $qb = $this->mailerService->getAllAsQB()
                ->where("m.recipient LIKE :query")
                ->orWhere("m.subject LIKE :query")
                ->orWhere("m.body LIKE :query")
                ->setParameter("query", "%".$this->getQuery()."%");
        
        $template = $this->getTemplate();
        $template->mails = $qb->getQuery()->getResult();
        $template->setFile(__DIR__ . "\Blocks\moduleSearch.latte");
    }
    
}
