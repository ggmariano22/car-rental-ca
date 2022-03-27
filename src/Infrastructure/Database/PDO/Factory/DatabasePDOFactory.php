<?php

namespace CarRentalCA\Infrastructure\Database\PDO\Factory;

use PDO;
use PDOException;

final class DatabasePDOFactory
{
    public static function create(array $config)
    {
        try {
            return new PDO(
                sprintf('mysql:host=%s;dbname=%s', $config['host'], $config['database']),
                    $config['user'],
                    $config['password']
            );
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }
}
