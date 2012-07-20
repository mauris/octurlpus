<?php

namespace Packfire\Octurlpus\Drivers\Dailymotion;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Dailymotion URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\Dailymotion
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected function match($url){
        return (bool)preg_match('`^https*://(www\.)*dailymotion\.com/\S+$`is', $url);
    }
    
    protected function oembed(){
        return 'http://www.dailymotion.com/api/oembed/';
    }
    
}