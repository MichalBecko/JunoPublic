<?php

namespace DefaultModule\Controls;

use Nette\Forms\Controls\TextInput,
    Nette\Application\UI\Form,
    Nette\Forms\Container;

/**
 * Description of DateTime
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DateTime extends TextInput {
    
    public static function register() {
        Form::extensionMethod('addDateTime', 'DefaultModule\Controls\DateTime::addDateTime');
        Container::extensionMethod('addDateTime', 'DefaultModule\Controls\DateTime::addDateTime');
    }
    
    public static function addDateTime($form, $name, $label) {
        $form[$name] = new self($label);
        return $form[$name];
    }

}
