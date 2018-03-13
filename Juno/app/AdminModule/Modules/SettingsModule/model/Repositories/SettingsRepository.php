<?php

namespace SettingsModule\Repositories;

use Nette,
    Kdyby\Doctrine\EntityManager,
    Kdyby\Doctrine\EntityRepository,
    SettingsModule\Entities\Settings;

/**
 * Description of SettingsRepository
 *
 * @author Vladino
 */
class SettingsRepository extends Nette\Object {
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var EntityRepository 
     */
    private $settingsEntity;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->settingsEntity = $em->getRepository(Settings::getClassName());
    }
    
    /**
     * Return setting entity
     * @param string $option
     * @return Settings
     */
    public function findOneByOption($option) {
	
        $criteria = array(
            "option" => $option
        );

        return $this->settingsEntity->findOneBy($criteria);
    }

    public function getAllAsQb() {
        $result = $this->settingsEntity->createQueryBuilder()
            ->select("s")
            ->from("SettingsModule\Entities\Settings", "s");

        return $result;
    }
    
    /**
     * Updates given entity
     * @param Settings $settings
     */
    public function update(Settings $settings) {
        $this->em->persist($settings);
        $this->done();
    }
    
    public function done() {
	    $this->em->flush();
    }
    
}
