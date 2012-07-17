<?php

namespace Packfire\Octurlpus\Drivers\SpeakerDeck;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Speaker Deck URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\SpeakerDeck
 * @since 1.0
 */
class Provider extends OcturlpusProvider {
    
    protected function match($url){
        return (bool)preg_match('`^https*://([\S\.]*)speakerdeck\.com/\S+$`is', $url);
    }
    
    protected function oembed(){
        return 'https://speakerdeck.com/oembed.json';
    }
    
}