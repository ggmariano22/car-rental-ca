<?php

use DI\Container;
use Psr\Container\ContainerInterface;
use Application\Http\Handlers\ListCarsHandler;
use Infrastructure\Doctrine\DoctrineInterface;
use Infrastructure\Doctrine\Factory\DoctrineORMFactory;
use Domain\Service\CarService;
use Domain\Entity\CarEntity;

$config = require('config-doctrine.php');
$container = new Container();

$container->set('doctrineConfig', function(ContainerInterface $container) use ($config) {
    return $config;
});

$container->set(DoctrineInterface::class, function(ContainerInterface $container) {
    return new DoctrineORMFactory($container);
});

$container->set(CarEntity::class, function(ContainerInterface $container) {
    return new CarEntity();
});

$container->set(CarService::class, function(ContainerInterface $container) {
    return new CarService(
        $container->get(CarEntity::class),
        $container->get(DoctrineInterface::class)
    );
});

$container->set(ListCarsHandler::class, function(ContainerInterface $container) {
    return new ListCarsHandler(
        $container->get(CarService::class)
    );
});

return $container;