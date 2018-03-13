<?php

namespace Artexe\CartModule;

use Nette\Http\Session,
    Nette\Http\SessionSection;

/**
 * Description of Cart
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class Cart {
    
    const CART_NAME = "cart";
    
    public static $TAX;
    public static $CURRENCY;
    
    /** @var Session */
    private $session;
    
    /** @var SessionSection */
    private $sessionSection;
    
    /** @var [] */
    private $items = [];
    
    /** @var [] */
    private $values = [];
    
    /** @var locale */
    private $locale;
    
    /** @var CartName */
    private $cartName;
    
    public function __construct(Session $session, $locale) {
        $this->session = $session;
        $this->locale = $locale;
        $this->cartName = self::CART_NAME.$this->locale;
        
        $this->setupCart();
    }
    
    private function setupCart() {
        
        if ($this->session->hasSection($this->cartName)) {
            $this->sessionSection = $this->session->getSection($this->cartName);
            $this->items = $this->sessionSection->items;
            $this->values = $this->sessionSection->values;
        } else {
            $this->sessionSection = $this->session->getSection($this->cartName);
            $this->items = [];
        }
        
        
        if ($this->locale == "cz") {
            self::$TAX = 21;
            self::$CURRENCY = "Kč";
        } else {
            self::$TAX = 20;
            self::$CURRENCY = "€";
        }
        
        $this->save();
    }
    
    public function addItem($id, $quantity = 1) {
        
        if (array_key_exists($id, $this->items)) {
            $this->items[$id] = $this->items[$id] + $quantity;
        } else {
            $this->items[$id] = $quantity;
        }
        
        $this->save();
    }
    
    public function setValues($values) {
        $this->values = $values;
        $this->save();
    }
    
    public function getPaymentType() {
        
        if (array_key_exists("paymentType", $this->getValues())) {
            $type = $this->getValues()["paymentType"];
            return $type;
        } else {
            return 0;
        }
    }
    
    public function getValues() {
        return $this->values;
    }
    
    public function removeItemFromCart($itemID) {
        unset($this->items[$itemID]);
        $this->save();
    }
    
    public function getQuantityByID($itemID) {
        return $this->items[$itemID];
    }
    
    public function getItems() {
        return $this->items;
    }
    
    public function getItemsKeys() {
        return array_keys($this->items);
    }
    
    private function save() {
        $this->sessionSection->items = $this->items;
        $this->sessionSection->values = $this->values;
    }
    
    public function reset() {
        $this->sessionSection->remove();
        $this->session->destroy();
    }
    
}
