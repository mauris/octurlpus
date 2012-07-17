<?php

namespace Packfire\Octurlpus;

/**
 * Bootstrap class
 * 
 * Octurlpus bootstrapper
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
class Bootstrap {
    
    /**
     * Initializes the bootstrapping process
     * @since 1.0
     */
    public static function initialize(){
        set_include_path(get_include_path() . PATH_SEPARATOR . dirname(dirname(__DIR__)));
        spl_autoload_register(function($class) {
            $class = ltrim($class, '\\');
            $fileName  = '';
            $namespace = '';
            if ($lastNsPos = strrpos($class, '\\')) {
                $namespace = substr($class, 0, $lastNsPos);
                $class = substr($class, $lastNsPos + 1);
                $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
            require $fileName;
        });
    }
    
}