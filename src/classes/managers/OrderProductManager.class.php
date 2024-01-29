<?php

class OrderProductManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof OrderProduct) {
            $query = "INSERT INTO orders_products (order_id, product_id, price, quantity) VALUES (:order_id, :product_id, :price, :quantity)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'order_id' => $data->getOrderId(),
                'product_id' => $data->getProductId(),
                'price' => $data->getPrice(),
                'quantity' => $data->getQuantity()
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

    public function getProductSales(int $product_id): array
    {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id=:product_id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'product_id' => $product_id
        ]);
        return $response->fetchAll();
    }

    public function getProductsOfOrder(int $order_id): array
    {
        $query = "SELECT p.id, p.name, p.price, pi.image, op.price as total_price, o.is_in_delivery, op.quantity
            FROM products as p
            INNER JOIN products_images as pi ON pi.product_id = p.id
            INNER JOIN orders_products as op ON op.product_id = p.id
            INNER JOIN orders as o ON o.id = op.order_id
            WHERE o.id = :order_id;";

        $response = $this->bdd->prepare($query);
        $response->execute([
            'order_id' => $order_id
        ]);
        return $response->fetchAll();
    }
}