<?php

namespace Packfire\Octurlpus\Drivers\WordPress;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Viddler URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\WordPress
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected function match($url){
        return (bool)preg_match('`^http://(\S+\.wordpress\.com|wp\.me)/\S+$`is', $url);
    }
    
    protected function oembed(){
        return 'http://public-api.wordpress.com/oembed/1.0/';
    }
    
}