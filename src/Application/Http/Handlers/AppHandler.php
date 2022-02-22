<?php

namespace Application\Http\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AppHandler extends AbstractHandler
{
    public function __construct() 
    {
    }

    public function index(Request $request, Response $response) {
        $response->getBody()->write(json_encode([
            'appName' => 'Car Rental - Clean Architeture',
            'version' => '1.0.0',
            'environment' => getenv('APP_ENV')
        ]));

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function alive(Request $request, Response $response)
    {
        $response->getBody()->write(json_encode([
            'success' => true,
            'message' => "I'm alive!"
        ]));

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }
}
