<?php

namespace MailerModule\Interfaces;

/**
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface ISettingsControlFactory {
    
    /**
     * @return \MailerModule\Controls\SettingsControl
     */
    public function create();
    
}
