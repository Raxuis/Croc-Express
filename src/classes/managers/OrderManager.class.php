<?php

class OrderManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Order) {
            $query = "INSERT INTO orders (user_id, price, coupon_id, address_id, is_in_delivery, validated_at)
                    VALUES (:user_id, :price, :coupon_id, :address_id, :is_in_delivery, :validated_at)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'user_id' => $data->getUserId(),
                'price' => $data->getPrice(),
                'coupon_id' => $data->getCouponId(),
                'address_id' => $data->getAddressId(),
                'is_in_delivery' => (int) $data->getIsInDelivery(),
                'validated_at' => null
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        return;
    }

    public function getOrdersByUserId(int $userId): array
    {
        $query = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'user_id' => $userId
        ]);
        $orders = $response->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function getCouponOfOrder(int $order_id): array
    {
        $query = "SELECT c.* FROM orders as o INNER JOIN coupons as c ON c.id = o.coupon_id WHERE o.id = :order_id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'order_id' => $order_id
        ]);
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

}