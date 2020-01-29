<?php

namespace App\Entity;

interface EntityInterface {
    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle(): string;

    /**
     * Get description
     * 
     * @return string
     */
    public function getDescription(): string;

    /**
     * Get price
     * 
     * @return int
     */
    public function getPrice(): float;

    /**
     * Get discount
     * 
     * @return int
     */
    public function getDiscount(): float;
}
