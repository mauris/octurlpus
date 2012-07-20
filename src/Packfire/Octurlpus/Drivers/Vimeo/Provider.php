<?php

namespace Packfire\Octurlpus\Drivers\Vimeo;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 * 
 * Providing Driver for Viddler URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\Vimeo
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
        return preg_match('`^https*://(www\.)*vimeo\.com/[0-9]+$`is', $url)
                || preg_match('`^https*://(www\.)*vimeo\.com/\S+/\S+$`is', $url)
                || preg_match('`^https*://(www\.)*vimeo\.com/groups/\S+/videos/[0-9]+$`is', $url);
    }
    
    /**
     * Get the oEmbed provider endpoint
     * @return string Returns the endpoint URL
     * @since 1.0
     */
    protected function oembed(){
        return 'http://vimeo.com/api/oembed.json';
    }
    
}