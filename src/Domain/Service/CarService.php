<?php

namespace Domain\Service;

use CarRentalCA\Infrastructure\Database\DatabaseInterface;

class CarService
{
    public function __construct(private DatabaseInterface $database)
    {
    }

    public function create(array $data = [])
    {
        return $this->database->insert($data);
    }
}
