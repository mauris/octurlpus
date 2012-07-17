<?php

namespace Packfire\Octurlpus\Drivers\Viddler;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Viddler URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\Viddler
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected static function match($url){
        return (bool)preg_match('`^http://([\S.]*)viddler.com/\S+$`is', $url);
    }
    
    protected static function oembed(){
        return 'http://tools.viddler.com/services/oembed/';
    }
    
}