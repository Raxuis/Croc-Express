<?php
require "Manager.class.php";

class ProductManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Product) {
            $query = "INSERT INTO products (name, description, price, buying_price, category_id, is_hidden) VALUES (:name, :description, :price, :buyingPrice, :categoryId, :isHidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'description' => $data->getDescription(),
                'price' => $data->getPrice(),
                'buyingPrice' => $data->getBuyingPrice(),
                'categoryId' => $data->getCategoryId(),
                'isHidden' => (int) $data->getIsHidden(),
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        // TODO: Implement editOne() method.
    }
}