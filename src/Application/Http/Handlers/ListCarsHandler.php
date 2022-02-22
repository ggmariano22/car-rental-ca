<?php

namespace Application\Http\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;
use Domain\Service\CarService;

class ListCarsHandler extends AbstractHandler
{
    public function __construct(
        private CarService $carService
    ) {
    }

    public function get(Request $request, Response $response) {
        $response->getBody()->write(json_encode([
            'success' => true,
            'status' => 200,
            'cars' => $this->carService->listCars()
        ]));

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function getById(Request $request, Response $response) {
        $response->getBody()->write(json_encode([
            'success' => true,
            'status' => 200,
            'car' => $this->carService->getById(
                (int) $request->getAttribute('id')
            )
        ]));

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }

    public function create(Request $request, Response $response)
    {
        $response->getBody()->write(json_encode([
            'success' => true,
            'message' => $this->carService->createCar(
                $this->getData($request->getBody()->getContents())
            )
        ]));

        return $response->withStatus(201);
    }
}
