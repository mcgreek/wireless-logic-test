<?php

namespace App\Entity;

/**
 * Setter functions for entity objects
 */
trait EntityHelper {
    
    public function setTitle(string $title)
    {
        $this->title = trim($title);
    }
    
    public function setDescription(string $description)
    {
        $this->description = trim($description);
    }
    
    public function setPrice(string $price)
    {
        $this->price = doubleval($this->cleanAmount($price));
    }
    
    public function setDiscount($discount)
    {
        $this->discount = doubleval($this->cleanAmount($discount));
    }
    
    private function cleanAmount($amount)
    {
        return ltrim(trim(strip_tags($amount)), '£');
    }
}
