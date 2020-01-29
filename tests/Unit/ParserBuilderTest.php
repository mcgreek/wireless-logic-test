<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\ParserBuilder;

class ParserBuilderTest extends TestCase {
    
    public function testGetParser()
    {
        $parser = ParserBuilder::getParser('Videx');

        $this->assertInstanceOf("App\\Parser\\ParserInterface", $parser);
    }
    
    public function testParserInterfaceExists()
    {
        $this->expectException(\Exception::class);

        ParserBuilder::getParser(md5('random_parser_name'));
    }
}
