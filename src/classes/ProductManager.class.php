<?php
class ProductManager {

    private PDO $bdd;

    public function __construct(PDO $database_connection)
    {
        $this->bdd = $database_connection;
    }

    public function createProduct(Product $product): int
    {
        if ($product instanceof Product) {
            $query = "INSERT INTO products (name, description, price, buying_price, category_id, is_hidden) VALUES (:name, :description, :price, :buyingPrice, :categoryId, :isHidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'buyingPrice' => $product->getBuyingPrice(),
                'categoryId' => $product->getCategoryId(),
                'isHidden' => $product->getIsHidden(),
            ]);
        }

        $product->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function getProduct(int $product_id)
    {
        $query = "SELECT * FROM products WHERE id=:id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'id' => $product_id
        ]);
        return $response->fetch();
    }

    public function getAllProducts(): array|null
    {
        $query = "SELECT * FROM products";
        $response = $this->bdd->query($query);
        return $response->fetchAll();
    }

    public function editProduct(Product $product)
    {
        echo "editProduct";
    }

    public function deleteProduct(int $product_id)
    {
        $query = "DELETE FROM products WHERE id = " . $product_id;
        $execute = $this->bdd->query($query);
        $execute->execute();
    }

    public function countProducts(): int
    {
        $query = "SELECT count(*) FROM products";
        $response = $this->bdd->query($query);
        return $response->fetchColumn();
    }

    public function exists(int $id)
    {
        echo "exists";
    }

}