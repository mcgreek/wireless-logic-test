<?php

namespace App;

use App\Parser\ParserInterface;

class ParserBuilder {
    /**
     * Get specific parser
     * 
     * @param string $parserType
     * @return \App\Parser\ParserInterface
     * @throws \Exception
     */
    static function getParser(string $parserType): ParserInterface
    {
        $dataClassName = "App\\Parser\\Data\\" . $parserType . 'Data';
        
        if (!class_exists($dataClassName)) {
            throw new \Exception('Parser data class does not exist ' . $dataClassName);
        }
        
        $data = new $dataClassName();
        
        $parserClassName = "App\\Parser\\" . $parserType . 'Parser';
        
        if (!class_exists($parserClassName)) {
            throw new \Exception('Parser class does not exist ' . $parserClassName);
        }
        
        return new $parserClassName($data);
    }
}
