<?php
class MenuProductManager extends Manager {

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
        echo "Edit to implement";
    }
}