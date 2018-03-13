<?php

namespace DefaultModule\Factories;

use Nette\Forms\Controls;

/**
 * Description of DynamicFormFactory
 * It is abstract class and contains function for dynamic forms
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
abstract class DynamicFormFactory extends \Nette\Object {
    
    /**
     * Adds next container into specified component
     * @param Controls\SubmitButton $button
     */
    public function addComponent(Controls\SubmitButton $button) {
        $button->getParent()->createOne();
    }
    
    /**
     * Deletes container if it has more than 1 container in component
     * @param Controls\SubmitButton $button
     * @param int $numberOfComponents 99% it has container and add component so default value is 2
     */
    public function deleteComponent(Controls\SubmitButton $button, $numberOfComponents = 2)
    {
        // first parent is container
        // second parent is it's replicator
        $replicator = $button->getParent()->getParent();
        if (count($replicator->getComponents()) > $numberOfComponents) {
            $replicator->remove($button->getParent(), TRUE);
        } else {
            $replicator->createOne();
            $replicator->remove($button->getParent(), TRUE);
        }
    }
    
}
