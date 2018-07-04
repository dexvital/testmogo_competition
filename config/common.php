<?php

spl_autoload_register(function($c) {
    $file = preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require 'vendor/autoload.php';

