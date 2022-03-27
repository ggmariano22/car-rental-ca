<?php

use DI\Container;
use Psr\Container\ContainerInterface;
use Application\Http\Handlers\ListCarsHandler;
use CarRentalCA\Infrastructure\Database\DatabaseInterface;
use CarRentalCA\Infrastructure\Database\PDO\Database;
use CarRentalCA\Infrastructure\Database\PDO\Factory\DatabasePDOFactory;
use Domain\Service\CarService;
use Domain\Entity\CarEntity;

$config = require('database-config.php');
$container = new Container();

$container->set('database_config', function(ContainerInterface $container) use ($config) {
    return $config;
});

$container->set(DatabasePDOFactory::class, function(ContainerInterface $container) {
    return DatabasePDOFactory::create(
        $container->get('database_config')
    );
});

$container->set(DatabaseInterface::class, function(ContainerInterface $container) {
    return new Database(
        $container->get(DatabasePDOFactory::class)
    );
});

$container->set(CarService::class, function(ContainerInterface $container) {
    return new CarService(
        $container->get(DatabaseInterface::class)
    );
});

$container->set(ListCarsHandler::class, function(ContainerInterface $container) {
    return new ListCarsHandler(
        $container->get(CarService::class)
    );
});

return $container;