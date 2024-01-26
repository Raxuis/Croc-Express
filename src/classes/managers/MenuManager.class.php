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
                'is_hidden' => (int) $data->getIsHidden()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        // TODO: Implement editOne() method.
        echo "Editing to implement";
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
}