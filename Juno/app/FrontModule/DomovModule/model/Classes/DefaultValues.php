<?php

namespace FrontModule\Classes;

use Nette\Object;

/**
 * Description of DefaultValues
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DefaultValues extends Object {
    
    public static function getLangs() {

        $langs = [
            "sk" => "SK",
            "en" => "EN"
        ];

        return $langs;
    } 
    
}
