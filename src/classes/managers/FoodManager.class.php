<?php

class FoodManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Food) {
            $query = "INSERT INTO foods (name, lipid, protein, carbohydrate, weight, is_hidden) VALUES (:name, :lipid, :protein, :carbohydrate, :weight, :is_hidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'lipid' => $data->getLipid(),
                'protein' => $data->getProtein(),
                'carbohydrate' => $data->getCarbohydrate(),
                'weight' => $data->getWeight(),
                'is_hidden' => (int)$data->getIsHidden()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        if ($data instanceof Food) {
            $query = "UPDATE foods SET name = :name, lipid = :lipid, protein = :protein, carbohydrate = :carbohydrate, weight = :weight WHERE id = :id";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'id' => $data->getId(),
                'name' => $data->getName(),
                'lipid' => $data->getLipid(),
                'protein' => $data->getProtein(),
                'carbohydrate' => $data->getCarbohydrate(),
                'weight' => $data->getWeight(),
            ]);
        }
    }
}
