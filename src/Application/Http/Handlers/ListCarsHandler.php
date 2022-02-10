<?php

namespace Application\Http\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ListCarsHandler
{
    public function __construct() {

    }

    public function getCars(Request $request, Response $response) {
        $response->getBody()->write(json_encode([
            'success' => true,
            'status' => 200,
            'data' => [
                'cars' => ['FordKa', 'Gol', 'Uno', 'Zafira', 'Corcel']
            ]
        ]));

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
    }
}
