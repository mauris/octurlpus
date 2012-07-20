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
    
    /**
     * Check if the URL matches the oEmbed provider's pattern
     * @param string $url The URL to check
     * @return boolean Returns true if the pattern matches, false otherwise.
     * @since 1.0
     */
    protected function match($url){
        return (bool)preg_match('`^https*://([\S]+\.)*speakerdeck\.com/\S+$`is', $url);
    }
    
    /**
     * Get the oEmbed provider endpoint
     * @return string Returns the endpoint URL
     * @since 1.0
     */
    protected function oembed(){
        return 'https://speakerdeck.com/oembed.json';
    }
    
}