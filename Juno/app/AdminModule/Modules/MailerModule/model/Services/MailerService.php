<?php

namespace MailerModule\Services;

use Nette,
    MailerModule\Repositories\MailerRepository,
    MailerModule\Entities\Mailer;

/**
 * Description of MailerService
 *
 * @author Vladino
 */
class MailerService extends Nette\Object {
    
    /** @var MailerRepository */
    private $mailerRepository;
    
    public function __construct(MailerRepository $mailerRepository) {
        $this->mailerRepository = $mailerRepository;
    }

    /**
     * Inserts mail entity
     * @param Mailer $mail
     */
    public function insert(Mailer $mailer) {
        return $this->mailerRepository->insert($mailer);
    }
    
    /**
     * Deletes given mail
     * @param Mailer $mail
     */
    public function delete(Mailer $mailer) {
        $this->mailerRepository->delete($mailer);
    }
    
    /**
     * Returns mail entity by given ID
     * @param int $id
     * @return Mailer
     */
    public function getById($id) {
        return $this->mailerRepository->getById($id);
    }
    
    /**
     * Returns array of mailer entities desc
     * @return array
     */
    public function getAllDesc() 
    {
        return $this->mailerRepository->getAllDesc();
    }
    
    public function getAllAsQB() {
        return $this->mailerRepository->getAllAsQB();
    }
    
}
