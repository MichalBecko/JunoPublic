<?php

namespace App\Presenters;

use Nette,
    Tracy\ILogger,
    App\BasePresenter,
    DefaultModule\Classes\MyMailer,
    Nette\Mail\Message;

/**
 * Error presenter.
 */
class ErrorPresenter extends BasePresenter
{
	/** @var ILogger */
	private $logger;

        /** @var MyMailer @inject */
        private $myMailer;

	public function __construct(ILogger $logger, MyMailer $myMailer) {
		$this->logger = $logger;
		$this->myMailer = $myMailer;
	}

	/**
	 * @param  Exception
	 * @return void
	 */
	public function renderDefault($exception) {
            
            if ($exception instanceof Nette\Application\BadRequestException) {
                    $code = $exception->getCode();
                    // load template 403.latte or 404.latte or ... 4xx.latte
                    $this->setView(in_array($code, array(403, 404, 405, 410, 500)) ? $code : '4xx');
                    // log to access.log
                    $this->logger->log("HTTP code $code: {$exception->getMessage()} in {$exception->getFile()}:{$exception->getLine()}", 'access');
                    
                    $this->contactDeveloper($exception);
            } else {
                    $this->setView('500'); // load template 500.latte
                    $this->logger->log($exception, ILogger::EXCEPTION); // and log exception
                    $this->contactDeveloper($exception);
            }

            if ($this->isAjax()) { // AJAX request? Note this error in payload.
                    $this->payload->error = TRUE;
                    $this->terminate();
            }
	}
        
        public function contactDeveloper($exception) {
            
            $message = new Message();
            $message->addTo("vladimir.vrab@artexe.sk");
            
            $message->setSubject("[EXCEPTION]");
            
            $code = $exception->getCode();
            $body = "HTTP code $code: {$exception->getMessage()} in {$exception->getFile()}:{$exception->getLine()}";
            $message->setBody($body);
            
            $this->myMailer->send($message);
        }
        
}
