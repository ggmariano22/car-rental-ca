<?php

namespace CarRentalCA\Infrastructure\Database;

interface DatabaseInterface
{
    public function insert(array $data);

    public function select(array $data = []);

    public function update(array $data);
    
    public function delete(array $data = []);
}
