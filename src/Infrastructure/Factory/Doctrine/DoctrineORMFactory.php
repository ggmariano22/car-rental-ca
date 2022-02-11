<?php

namespace Infrastructure\Factory\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineORMFactory
{
    /**
     * @var array
     */
    public array $paths;

    /**
     * @var array
     */
    public $dbParams;

    /**
     * @var boolean
     */
    public $isDevMode;

    /**
     * @var EntityManager
     */
    public $entityManager;

    public function __construct() {
        //var_dump(dirname(__DIR__, 3));exit;

        $this->paths = [
            dirname(__DIR__, 3),
        ];
        $this->isDevMode = getenv('APP_ENV') === 'development' ? true : false;
        // the connection configuration
        $this->dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'car-rental-ca',
            'host'     => 'localhost'
        ];
        
        $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode, useSimpleAnnotationReader: false);
        $this->entityManager = EntityManager::create($this->dbParams, $config);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
