<?php

class MenuProductManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof MenuProduct) {
            $query = "INSERT INTO menus_products (menu_id, product_id) VALUES (:menu_id, :product_id)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'menu_id' => $data->getMenuId(),
                'product_id' => $data->getProductId()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        // TODO: Implement editOne() method.
    }

    public function deleteOneByProductId(int $product_id, int $menu_id): void
    {
        $query = "DELETE FROM " . $this->table . " WHERE menu_id = :menu_id AND product_id = :product_id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'menu_id' => $menu_id,
            'product_id' => $product_id
        ]);
    }
}