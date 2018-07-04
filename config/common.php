<?php

spl_autoload_register(function($c) {
    $file = preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require 'vendor/autoload.php';
//////////////////////////////////////////////////////////////////////////////////////
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = ["/entity"];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => getenv('MOGO_DB_USER'),
    'password' => getenv('MOGO_DB_PASS'),
    'dbname'   => getenv('MOGO_DB_DB'),
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

