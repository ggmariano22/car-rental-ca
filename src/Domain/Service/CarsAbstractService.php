<?php

namespace Domain\Service;

class CarsAbstractService
{
    public function extractData(mixed $entity)
    {
        $cars = [];
        foreach ($entity as $car) {
            $cars[] = [
                'id'          => $car->getId(),
                'name'        => $car->getName(),
                'brand'       => $car->getBrand(),
                'description' => $car->getDescription(),
                'capacity'    => $car->getCapacity()
            ];
        }

        return $cars;
    }
}
