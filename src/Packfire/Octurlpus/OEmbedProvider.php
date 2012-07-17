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
        return $this->match($url);
    }
    
    public function fetch(){
        $url = $this->oembed() . '?url=' . urlencode($this->url) . '&format=json';
        $data = self::getData($url);
        return json_decode($data, true);
    }
    
    private static function getData($url){
        $ch = curl_init();
        if(substr($url,0,8) == 'https://'){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);     
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    
    protected abstract function match($url);
    
    protected abstract function oembed();
    
}