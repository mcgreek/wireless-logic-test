<?php

namespace App\Parser;

/**
 * Interface for parsers
 */
interface ParserInterface
{
    /**
     * Get products from provided data source
     * @return array Array of DataInterface objects
     */
    public function getProducts(): array;
}