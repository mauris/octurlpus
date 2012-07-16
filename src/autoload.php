<?php

/**
 * Octurlpus auto-loader
 * 
 * Autoloader for Octurlpus
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @since 1.0
 */

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