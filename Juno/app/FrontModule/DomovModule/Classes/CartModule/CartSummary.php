<?php

namespace Artexe\CartModule;

/**
 * Description of CartSummery
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class CartSummary {
    
    private $price = 0;
    
    private $tax;
    
    private $priceWithTax = 0;
    
    public static function calculate($cart, $productService, $locale) {
        
        $summary = new self();
        
        $products = $productService->getAllAsQB()
            ->where("p.id in (:ids)")
            ->setParameter("ids", $cart->getItemsKeys())
            ->getQuery()
            ->getResult();
        
        foreach ($products as $pro) {
            $price = $pro->getTr($locale)->price * $cart->getItems()[$pro->id];
            $summary->priceWithTax += $price;
            $summary->price += $price / ((Cart::$TAX + 100) / 100);
        }
        $summary->tax = Cart::$TAX;

        return $summary;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function getTax() {
        return $this->tax;
    }

    public function getPriceWithTax() {
        return $this->priceWithTax;
    }

}
