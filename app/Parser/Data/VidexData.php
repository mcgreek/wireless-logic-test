<?php

namespace App\Parser\Data;

use App\Parser\Data\DataInterface;
use Curl\Curl;

class VidexData implements DataInterface {
    private $curl;
    
    public function __construct() {
        $this->curl = new Curl();
    }
    
    /**
     * @return string
     */
    public function getUrl() {
        return 'https://videx.comesconnected.com/';
    }
    
    /**
     * Get page HTML
     * 
     * @return string
     */
    public function getHtml() {
        $this->curl->get($this->getUrl());
        
        return $this->curl->response;
    }
    
    public function getCode() {
        $this->curl->getHttpStatusCode();
    }
}