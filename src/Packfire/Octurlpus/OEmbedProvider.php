<?php

namespace Packfire\Octurlpus;

use Packfire\Octurlpus\Provider;

/**
 * OEmbedProvider class
 * 
 * A provider that supplies oEmbed compatible data
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
abstract class OEmbedProvider extends Provider {
    
    protected $url;
    
    public function peek($url){
        $this->url = $url;
        return self::match($url);
    }
    
    public function fetch(){
        $url = self::oembed() . '?url=' . urlencode($this->url) . '&format=json';
        $data = self::getData($url);
        return json_decode($data, true);
    }
    
    private static function getData($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    
    protected abstract static function match($url);
    
    protected abstract static function oembed();
    
}