<?php

namespace Packfire\Octurlpus\Drivers\Flickr;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Flickr URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\Flickr
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected function match($url){
        return (bool)preg_match('`^https*://([\S]+\.)*flickr\.com/\S+$`is', $url);
    }
    
    protected function oembed(){
        return 'http://www.flickr.com/services/oembed/';
    }
    
}