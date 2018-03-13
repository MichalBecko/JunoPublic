<?php

namespace Artexe\CartModule;

/**
 * Description of PaymentType
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class PaymentType {
    
    public static function getPaymentTypes() {
        
        $arr = [
            0 => "prevodom",
            1 => "dobierka"
        ];
        
        return $arr;
    }
    
}
