<?php

class MenuManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Menu) {
            $query = "INSERT INTO menus (name, price, is_hidden) VALUES (:name, :price, :is_hidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'price' => $data->getPrice(),
                'is_hidden' => (int)$data->getIsHidden()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        $query = "UPDATE menus SET name = :name, price = :price, is_hidden = :isHidden WHERE id = :id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'name' => $data->getName(),
            'price' => $data->getPrice(),
            'isHidden' => (int)$data->getIsHidden(),
            'id' => $data->getId(),
        ]);


    }

    public function getAllProductsFromMenu(int $data): array
    {
        $query = "SELECT p.* from products as p 
        INNER JOIN menus_products as mp ON mp.product_id = p.id 
        INNER JOIN menus as m ON mp.menu_id = m.id 
        WHERE m.id = :menu_id;
        ";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'menu_id' => $data
        ]);
        return $response->fetchAll();
    }

    public function toggleHide(int $id): void
    {
        $query = "UPDATE menus SET is_hidden = NOT is_hidden WHERE id = :id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'id' => $id
        ]);
    }
}