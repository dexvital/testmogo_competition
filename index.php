<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($c) {
    require_once preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';
});

//////////////////////////////////////////////////////////////////////////////////////

use classes\Competition;

$competition = new Competition();


