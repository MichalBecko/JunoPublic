<?php

namespace FormInputRenderer\Controls;

use Nette\Application\UI\Control,
    Nette\Bridges\ApplicationLatte\Template;

/**
 * Description of FormInputRenderer
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class Renderer extends Control {
    
    public function render($field) {
        
        $template = $this->template;
        $template->field = $field;
        $template->attrs = $field->getControlPrototype()->attrs;
        
        $fieldClass = get_class($field);        
        switch ($fieldClass) {
            case "Nette\Forms\Controls\TextInput":
                $this->renderText($template);
                break;
            case "Nette\Forms\Controls\TextArea":
                $this->renderTextArea($template);
                break;
            case "Nette\Forms\Controls\Checkbox":
                $this->renderCheckbox($template);
                break;
            case "DefaultModule\Controls\DateTime":
                $this->renderDateTime($template);
                break;
            case "Nette\Forms\Controls\SelectBox":
                $this->renderSelectBox($template);
                break;
            case "Nette\Forms\Controls\UploadControl":
                $this->renderUpload($template);
                break;
            case "Nette\Forms\Controls\CheckboxList":
                $this->renderCheckboxList($template);
                break;
            default:
                break;
        }
        
        // render template out
        $template->render();
    }
    
    /**
     * @param Template $template
     */
    private function renderText($template) {
        $template->setFile(__DIR__ . "/templates/formInputText.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderTextArea($template) {
        $template->setFile(__DIR__ . "/templates/formInputTextArea.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderCheckbox($template) {
        $template->setFile(__DIR__ . "/templates/formInputCheckbox.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderDateTime($template) {
        $template->setFile(__DIR__ . "/templates/formInputDateTime.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderUpload($template) {
        $template->setFile(__DIR__ . "/templates/formInputUpload.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderCheckboxList($template) {
        $template->setFile(__DIR__ . "/templates/formInputCheckboxList.latte");
    }
    
    /**
     * @param Template $template
     */
    private function renderSelectBox($template) {
        $template->setFile(__DIR__ . "/templates/formInputSelectBox.latte");
    }
}
