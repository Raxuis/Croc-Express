<?php

abstract class Manager
{
    protected PDO $bdd;
    protected string $table;

    public function __construct(PDO $database_connection, string $table)
    {
        $this->bdd = $database_connection;
        $this->table = $table;
    }

    abstract public function createOne(object $data): int;

    abstract public function editOne(object $data): void;

    public function getOne(int $data_id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'id' => $data_id
        ]);
        return $response->fetch();
    }

    public function getAll(): array|null
    {
        $query = "SELECT * FROM " . $this->table;
        $response = $this->bdd->query($query);
        return $response->fetchAll();
    }

    public function deleteOne(int $data_id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = " . $data_id;
        $execute = $this->bdd->query($query);
        $execute->execute();
    }

    public function countItems(): int
    {
        $query = "SELECT count(*) FROM " . $this->table;
        $response = $this->bdd->query($query);
        return $response->fetchColumn();
    }
}
