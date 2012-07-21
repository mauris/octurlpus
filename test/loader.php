<?php

call_user_func(function(){
    $loader = require __DIR__ . '/../src/vendors/autoload.php';
    $loader->add(null, __DIR__);
});