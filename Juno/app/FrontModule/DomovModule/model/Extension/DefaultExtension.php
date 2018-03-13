<?php

namespace Front\DefaultModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of DefaultExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DefaultExtension extends DefaultModuleExtension {

    public function loadConfiguration() {

        $this->appendRouteList("Front:Domov", '[<locale=sk sk|en|de>/]<presenter>/<action>[/<id>]', "Domov:default");
        
    }

}
