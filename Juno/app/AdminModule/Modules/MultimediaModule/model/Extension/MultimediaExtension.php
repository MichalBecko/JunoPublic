<?php

namespace MultimediaModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of MultimediaExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class MultimediaExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('multimediaService'))
                ->setClass('MultimediaModule\Services\MultimediaService');

        $builder->addDefinition($this->prefix('multimediaRepository'))
                ->setClass('MultimediaModule\Repositories\MultimediaRepository');
        
//        $builder->addDefinition($this->prefix('multimediaSaver'))
//                ->setClass('MultimediaModule\Services\MultimediaSaver', array("@Nette\Http\FileUpload"));
        
        $builder->addDefinition($this->prefix('iMultimediaSaver'))
                ->setImplement('MultimediaModule\Interfaces\IMultimediaSaver');
        
        $builder->addDefinition($this->prefix('multimediaFolderService'))
                ->setClass('MultimediaModule\Services\Multimedia_folderService');

        $builder->addDefinition($this->prefix('multimediaFolderRepository'))
                ->setClass('MultimediaModule\Repositories\Multimedia_folderRepository');
    }
    
    

}
