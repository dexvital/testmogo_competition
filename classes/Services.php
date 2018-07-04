<?php

namespace classes;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Services
{
    /**
     * @return EntityManager|null
     */
    public static function entityManager()
    {
        static $entityManager = null;
        if (!isset($entityManager)) {
            $paths = ["/entity"];
            $isDevMode = false;

            // the connection configuration
            $dbParams = [
                'driver' => 'pdo_mysql',
                'user' => getenv('MOGO_DB_USER'),
                'password' => getenv('MOGO_DB_PASS'),
                'dbname' => getenv('MOGO_DB_DB'),
            ];

            $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            try {
                $entityManager = EntityManager::create($dbParams, $config);
            } catch (\Exception $e) {

            }
        }
        return $entityManager;
    }
}