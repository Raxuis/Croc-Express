<?php

class ProductFoodManager extends Manager
{
    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof ProductFood) {
            $query = "INSERT INTO products_foods (product_id, food_id) VALUES (:product_id, :food_id)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'product_id' => $data->getProductId(),
                'food_id' => $data->getFoodId()
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

    public function getAllFoodOfProduct(int $product_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id=:product_id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'product_id' => $product_id
        ]);
        return $response->fetchAll();
    }
}