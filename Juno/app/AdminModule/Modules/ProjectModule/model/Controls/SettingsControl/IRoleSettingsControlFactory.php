<?php

namespace ProjectModule\Interfaces;

/**
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface IRoleSettingsControlFactory {
    
    /**
     * @return \ProjectModule\Controls\RoleSettingsControl
     */
    public function create();
    
}
