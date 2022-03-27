<?php

namespace CarRentalCA\Infrastructure\Database\PDO;

use CarRentalCA\Infrastructure\Database\DatabaseInterface;
use PDO;
use PDOStatement;

final class Database implements DatabaseInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getClient()
    {
        return $this->pdo;
    }

    public function insert(array $data)
    {
        $sql = 'INSERT INTO cars (name, description, brand, capacity, value)
                VALUES (:name, :description, :brand, :capacity, :value)';

        $stmt = $this->pdo->prepare($sql);
        $this->bindParams($stmt, $data);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function select(array $data = [])
    {
        //TODO

    }

    public function update(array $data)
    {
        //TODO
    }

    public function delete(array $data = [])
    {
        //TODO
    }

    private function bindParams(PDOStatement $statement, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
        }
    }
}