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
    
    public abstract function peek($url);
    
    public abstract function fetch();
    
}