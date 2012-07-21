<?php

/**
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 */
use Packfire\Octurlpus\Bootstrap;

set_include_path(__DIR__
        . PATH_SEPARATOR . get_include_path());
include(__DIR__ . '/../src/Packfire/Octurlpus/Bootstrap.php');
Bootstrap::initialize();