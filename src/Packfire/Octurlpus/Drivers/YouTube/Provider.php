<?php

namespace Packfire\Octurlpus\Drivers\YouTube;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for YouTube URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\YouTube
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected function match($url){
        $urlParts = parse_url($url);
        if(array_key_exists('host', $urlParts)
                && array_key_exists('path', $urlParts)){
            if(substr($urlParts['host'], 0, 4) == 'www.'){
                $urlParts['host'] = substr($urlParts['host'], 4);
            }
            if($urlParts['host'] == 'youtube.com'
                    && $urlParts['path'] == '/watch'
                    && array_key_exists('query', $urlParts)){
                $params = array();
                parse_str($urlParts['query'], $params);
                if(array_key_exists('v', $params)){
                    return true;
                }
            }elseif($urlParts['host'] == 'youtu.be'){
                if(substr($urlParts['path'], 1)){
                    return true;
                }
            }
        }
        return false;
    }
    
    protected function oembed(){
        return 'http://www.youtube.com/oembed';
    }
    
}