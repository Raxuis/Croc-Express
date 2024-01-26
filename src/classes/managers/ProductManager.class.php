<?php

class ProductManager extends Manager
{

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
        $query = "UPDATE products SET name = :name, description = :description, price = :price, buying_price = :buyingPrice, category_id = :categoryId, is_hidden = :isHidden WHERE id = :id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'name' => $data->getName(),
            'description' => $data->getDescription(),
            'price' => $data->getPrice(),
            'buyingPrice' => $data->getBuyingPrice(),
            'categoryId' => $data->getCategoryId(),
            'isHidden' => (int) $data->getIsHidden(),
            'id' => $data->getId(),
        ]);

    }
    public function getProductsByCategoryId(int $category_id, bool $onlyNotHidden=false): array
    {
        if ($onlyNotHidden) {
            $query = "SELECT p.* FROM products as p INNER JOIN categories as c ON p.category_id = c.id WHERE c.id = :category_id AND NOT p.is_hidden";
        } else {
           $query = "SELECT p.* FROM products as p INNER JOIN categories as c ON p.category_id = c.id WHERE c.id = :category_id";
        }

        $response = $this->bdd->prepare($query);
        $response->execute([
            'category_id' => $category_id
        ]);
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public function toggleHide(int $product_id): void
    {
        $query = "UPDATE products SET is_hidden = NOT is_hidden WHERE id = :product_id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'product_id' => $product_id
        ]);
    }
}