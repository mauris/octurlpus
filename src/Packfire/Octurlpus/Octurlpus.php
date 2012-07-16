<?php

namespace Packfire\Octurlpus;

/**
 * Octurlpus class
 * 
 * Main functioning class for Octurlpus functionality
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
class Octurlpus {
    
    private $providers = array(
        'YouTube'
    );
    
    public function __construct(){
        $this->loadProviders();
    }
    
    private function loadProviders(){
        $providers = array();
        foreach($this->providers as $provider){
            $name = 'Packfire\\Octurlpus\\Drivers\\' . $provider . '\\Provider';
            $providers[$provider] = new $name();
        }
        $this->providers = $providers;
    }
    
    public function type($url){
        foreach($this->providers as $name => $provider){
            /* @var Packfire\Octurlpus\Provider $provider */
            if($provider->peek($url)){
                return $name;
            }
        }
    }
    
    public function request($url){
        foreach($this->providers as $provider){
            /* @var Packfire\Octurlpus\Provider $provider */
            if($provider->peek($url)){
                return $provider->fetch();
            }
        }
    }
    
}