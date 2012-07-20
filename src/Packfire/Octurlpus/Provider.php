<?php

namespace Packfire\Octurlpus;

/**
 * Driver class
 * 
 * Generic driver for Octurlpus URL parsing
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
abstract class Provider {
    
    /**
     * The current working URL
     * @var string
     * @since 1.0
     */
    protected $url;
    
    public function set($url){
        $this->url = $url;
    }
    
    /**
     * Peek into the URL to see if the Provider can handle this URL.\
     * 
     * @return boolean Returns true if the Provider can handle and fetch data
     *          for the URL, and false otherwise.
     * @since 1.0
     */
    public abstract function peek();
    
    /**
     * Fetch data from the current working URL
     * @return array Returns the array containing the data
     * @since 1.0
     */
    public abstract function fetch();
    
}