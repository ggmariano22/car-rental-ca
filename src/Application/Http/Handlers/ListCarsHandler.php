<?php

namespace Application\Http\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Domain\Service\CarService;

class ListCarsHandler extends AbstractHandler
{
    private CarService $carService;

    public function __construct()
    {
        $this->carService = new CarService();
    }

    public function get(Request $request, Response $response) {
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

    public function create(Request $request, Response $response)
    {
        $response->getBody()->write(json_encode([
            'success' => true,
            'message' => $this->carService->createCar(
                $this->getAttributes($request->getBody()->getContents())
            )
        ]));

        return $response->withStatus(201);
    }
}
