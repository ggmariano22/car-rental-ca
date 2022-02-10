<?php

namespace Infrastructure\Factory\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineORMFactory
{
    /**
     * @var array
     */
    protected array $paths;

    /**
     * @var array
     */
    protected $dbParams;

    /**
     * @var boolean
     */
    protected $isDevMode;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct() {
        $this->paths = [
            '/src'
        ];
        $this->isDevMode = getenv('APP_ENV') === 'development' ? true : false;
        // the connection configuration
        $this->dbParams = [
            'driver'   => getenv('DOCTRINE_DRIVER'),
            'user'     => getenv('DOCTRINE_USER'),
            'password' => getenv('DOCTRINE_PWD'),
            'dbname'   => getenv('DOCTRINE_DBNAME'),
        ];
        
        $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager = EntityManager::create($this->dbParams, $config);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
