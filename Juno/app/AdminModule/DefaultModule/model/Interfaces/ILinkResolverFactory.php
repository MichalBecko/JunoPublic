<?php

namespace DefaultModule\Interfaces;

use DefaultModule\Classes\LinkResolver;

/**
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
interface ILinkResolverFactory {
    
    /**
     * @return LinkResolver
     */
    function create($string);
    
}
