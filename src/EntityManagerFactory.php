<?php

namespace App;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class EntityManagerFactory
{
    protected static $entityManager;
    protected static array $paths;
    protected static bool $isDevMode;

    // the connection configuration
    protected static array $dbParams;

    private function __construct() {
    }

    public static function query()
    {
        self::$paths = ["/src/Entity"];
        self::$isDevMode = false;
        self::$dbParams = [
            'driver'   => 'pdo_mysql',
            'host'     => 'mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'apricode',
        ];

        $config = Setup::createConfiguration(self::$isDevMode);
        $driver = new AnnotationDriver(new AnnotationReader(), self::$paths);

        AnnotationRegistry::registerLoader('class_exists');
        $config->setMetadataDriverImpl($driver);

        if (self::$entityManager === null) {
            self::$entityManager = EntityManager::create(self::$dbParams, $config);
        }

        return self::$entityManager;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

}
