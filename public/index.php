<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Factory\AppFactory;
use Application\Http\Handlers\ListCarsHandler;


require '../bootstrap.php';

$container = require('../config/dependency.php');

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->group('/api/v1', function ($app) {
    $app->get('/cars', ListCarsHandler::class . ':get');
    $app->post('/cars', ListCarsHandler::class . ':create');
});

$app->run();