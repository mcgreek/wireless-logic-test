<?php
namespace Tests\Unit\Parser;

use PHPUnit\Framework\TestCase;

use App\Parser\Data\VidexData;
use App\Parser\VidexParser;

class ParserBuilderTest extends TestCase {

    private $html = <<< 'HTML'
<!DOCTYPE html>
<html>
 <head >
    <script>
        var BASE_URL = 'https://videx.comesconnected.com/';
    </script>
        <meta charset="utf-8"/>
 </head>
    <body>
        <div class="a-tag">
            <div class="col-xs-4">
                <div class="package featured-right" style="margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:25px">
                    <div class="header dark-bg">
                        <h3>Option 40 Mins</h3>
                    </div>
                    <div class="package-features">
                        <ul>
                            <li>
                                <div class="package-name">Up to 40 minutes talk time per month</div>
                            </li>
                            <li>
                                <div class="package-price"><span class="price-big">£6.00</span><br />(inc. VAT)<br />Per Month</div>
                            </li>
                            <li>
                                <div class="package-data">12 Months - Voice & SMS Service Only</div>
                            </li>
                        </ul>
                        <div class="bottom-row">
                            <a class="btn btn-primary main-action-button" href="activate" role="button">Choose</a>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
HTML;
    
    public function testProductsCouldBeParsed()
    {
        $videxData = $this->createMock(VidexData::class);
        
        $videxData->method('getHtml')
             ->willReturn($this->html);
        
        $parser = new VidexParser($videxData);
        $products = $parser->getProducts();
        
        $this->assertEquals(1, count($products));
        
        $product = reset($products);
        
        $this->assertEquals("Option 40 Mins", $product->getTitle());
        $this->assertEquals("Up to 40 minutes talk time per month", $product->getDescription());
        $this->assertEquals(6, $product->getPrice());
        $this->assertEquals(0, $product->getDiscount());
    }
}

