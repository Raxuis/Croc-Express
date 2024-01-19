<?php

class FoodManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        // TODO: Implement createOne() method.
    }

    public function editOne(User|Product $data): void
    {
        // TODO: Implement editOne() method.
    }
}