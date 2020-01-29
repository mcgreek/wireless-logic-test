<?php

namespace App\Entity;

use App\Entity\EntityInterface;

use App\Entity\EntityHelper;

class VidexEntity implements EntityInterface {
    use EntityHelper;
    
    private $title;
    private $description;
    private $price;
    private $discount;
    
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }
    
}
