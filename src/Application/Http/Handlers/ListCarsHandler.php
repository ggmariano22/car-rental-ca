<?php

namespace Application\Http\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Domain\Service\CarService;

class ListCarsHandler extends AbstractHandler
{
    public function __construct(private CarService $carService)
    {
    }

    public function create(Request $request, Response $response)
    {
        $results = $this->carService->create(
            $this->serialize(
                $request->getBody()->getContents()
            )
        );

        $response->getBody()->write(json_encode([
            'success' => true,
            'message' => "Car created with ID $results"
        ]));

        return $response->withStatus(201);
    }

    public function get(Request $request, Response $response) {
        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
    }
}
