<?php

namespace Domain\Service;

class CarsAbstractService
{
    public function extractDescription(array $entity)
    {
        $cars = [];
        foreach ($entity as $car) {
            $cars[] = [
                'id' => $car->getId(),
                'description' => $car->getDescription()
            ];
        }

        return $cars;
    }
}