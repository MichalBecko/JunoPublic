<?php

namespace DefaultModule\Interfaces;

use DefaultModule\Controls\GeneralSearch;

/**
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface IGeneralSearch {
    
    /**
     * @return GeneralSearch
     */
    function create($query);
    
}
