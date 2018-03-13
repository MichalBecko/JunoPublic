<?php

namespace MultimediaModule\Interfaces;

use MultimediaModule\Services\MultimediaSaver,
    Nette\Http\FileUpload;

/**
 * @author Vladino
 */
interface IMultimediaSaver {
    
    /** 
    * @return MultimediaSaver
    */
    public function create(FileUpload $fileUpload);
    
}
