<?php

namespace SettingsModule\Services;

use Nette,
    SettingsModule\Repositories\SettingsRepository,
    SettingsModule\Entities\Settings;

/**
 * Description of SettingsService
 *
 * @author Vladino
 */
class SettingsService extends Nette\Object {
    
    /**
     * @var SettingsRepository
     */
    public $settingsRepository;
    
    public function __construct(SettingsRepository $settingsRepository) {
	    $this->settingsRepository = $settingsRepository;
    }
    
    /**
     * Returns one settings entity
     * @param string $option
     * @return Settings
     */
    public function findOneByOption($option) {
	    return $this->settingsRepository->findOneByOption($option);
    }

    public function getAllAsQb() {
        return $this->settingsRepository->getAllAsQb();
    }

    /**
     * Updates given entity
     * @param Settings $settings
     */
    public function update(Settings $settings) {
	$this->settingsRepository->update($settings);
    }
    
}
