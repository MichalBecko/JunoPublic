<?php

namespace MailerModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    MailerModule\Entities\Mailer;

/**
 * Description of MailRepository
 *
 * @author Vladino
 */
class MailerRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $mailEntity;

    public function __construct(EntityManager $em)
    {
	$this->em = $em;
	$this->mailEntity = $em->getRepository(Mailer::getClassName());
    }
    
    /**
     * Inserts mail
     * @param Mailer $mail
     */
    public function insert(Mailer $mail) {
        $this->em->persist($mail);
        $this->done();
        
        return $mail;
    }
    
    /**
     * Deletes given mail
     * @param Mailer $mail
     */
    public function delete(Mailer $mail) {
        $this->em->remove($mail);
        $this->done();
    }
    
    /**
     * Returns mail entity by given ID
     * @param int $id
     * @return Mailer
     */
    public function getById($id) {
        return $this->mailEntity->find($id);
    }
    
    /**
     * Returns array of mail entities desc
     * @return array
     */
    public function getAllDesc() {
        $orderBy = array(
            "sentDate" => "desc"
        );
        
        return $this->mailEntity->findBy(array(), $orderBy);
        
    }
    
    public function getAllAsQB() {
        
        $result = $this->mailEntity->createQueryBuilder()
                ->select("m")
                ->from("MailerModule\Entities\Mailer", "m");
        
        return $result;
    }
    
    public function done() {
	$this->em->flush();
    }
    
}
