<?php

namespace Packfire\Octurlpus;

/**
 * IProvider interface
 * 
 * An abstraction of a provider class
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
interface IProvider {
    
    /**
     * Set the current working URL
     * @param string $url The URL to set as the current working URL
     * @since 1.0
     */
    public function set($url);
    
    /**
     * Peek into the URL to see if the Provider can handle this URL.
     * 
     * @return boolean Returns true if the Provider can handle and fetch data
     *          for the URL, and false otherwise.
     * @since 1.0
     */
    public function peek();
    
    /**
     * Fetch data from the current working URL
     * @return array Returns the array containing the data
     * @since 1.0
     */
    public function fetch();
    
}