<?php
namespace App\Parser;

use App\Parser\ParserInterface;
use App\Parser\Data\DataInterface;
use App\Entity\VidexEntity;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Videx product parser class
 */
class VidexParser implements ParserInterface {
    
    /**
     * Data provider
     * 
     * @var DataInterface 
     */
    private $data;
    
    /**
     * HTML page crawler
     * 
     * @var Crawler 
     */
    private $crawler;
    
    public function __construct(DataInterface $data) {
        $this->data = $data;
        
        $this->crawler = new Crawler($data->getHtml());
    }
    
    /**
     * {@inheritdoc }
     */
    public function getProducts(): array
    {
        $products = [];
        
        foreach ($this->crawler->filter('div > .package') as $domElement) {
            $entity = new VidexEntity();
            
            $domCrawler = new Crawler($domElement);
            $title = $domCrawler->filter('div.header h3')->text();
            $description = $domCrawler->filter('div.package-name')->text();
            $price = $domCrawler->filter('div.package-price span.price-big')->text();
            
            try{
                $discount = $domCrawler->filter('div.package-price')->children()->last()->text();
                $match = [];
                preg_match('/£([0-9.]+)/', $discount, $match);
                $discount = is_array($match) && count($match) == 2 ? $match[1] : 0;
            } catch (\InvalidArgumentException $e) {
                $discount = 0;
            }
            
            $entity->setTitle($title);
            $entity->setDescription($description);
            $entity->setPrice($price);
            $entity->setDiscount($discount);
            
            $products[] = $entity;
        }
        
        return $products;
    }
}