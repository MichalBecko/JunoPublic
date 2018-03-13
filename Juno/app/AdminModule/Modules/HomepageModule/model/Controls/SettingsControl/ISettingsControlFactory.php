<?php

namespace HomepageModule\Interfaces;

/**
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface ISettingsControlFactory {
    
    /**
     * @return \HomepageModule\Controls\SettingsControl
     */
    public function create();
    
}
