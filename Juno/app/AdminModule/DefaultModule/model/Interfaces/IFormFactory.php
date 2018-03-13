<?php

namespace DefaultModule\Interfaces;

use Nette\Application\UI\Form;

/**
 * Description of IFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface IFormFactory {
    
    /**
     * Returns prepared form for this factory
     */
    function getForm();
    
    /**
     * Returns prepared form for adding
     */
    function createAddForm();
    
    /**
     * Adds data from form
     */
    function add(Form $form);
    
    /**
     * Returns prepared form for editing data
     */
    function createEditForm($id);
    
    /**
     * Edits data from form
     */
    function edit(Form $form);
    
}
