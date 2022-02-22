<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Factory\AppFactory;
use Application\Http\Handlers\ListCarsHandler;
use Application\Http\Handlers\AppHandler;


require '../bootstrap.php';

$container = require('../config/dependency.php');

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/', AppHandler::class . ':index');
$app->get('/alive', AppHandler::class . ':alive');

$app->group('/api/v1', function ($app) {
    $app->get('/cars', ListCarsHandler::class . ':get');
    $app->get('/cars/{id}', ListCarsHandler::class . ':getById');
    $app->post('/cars', ListCarsHandler::class . ':create');
});

$app->run();