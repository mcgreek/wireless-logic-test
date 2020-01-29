<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\VidexProducts;
use App\ParserBuilder;

class PageCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'page:crawler {parser}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl a page for products and output them as json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $parserType = $this->argument('parser');

        VidexProducts::truncate(); // TODO: this could be generic or parser specific Model
        
        $parser = ParserBuilder::getParser(ucfirst($parserType));
        
        $products = $parser->getProducts();
        
        foreach($products as $product) {
            VidexProducts::create(
                [
                    'title' => $product->getTitle(),
                    'description' => $product->getDescription(), 
                    'price' => $product->getPrice(), 
                    'discount' => $product->getDiscount(),
                ]
            );
        }
        
        $products = VidexProducts::orderByDesc('price')->get();
        
        echo $products->toJson();
    }
}
