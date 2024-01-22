<?php

class OrderManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Order) {
            $query = "INSERT INTO orders (user_id, price, coupon_id, address_id, is_in_delivery, is_validated) VALUES (:user_id, :price, :coupon_id, :address_id, :is_in_delivery, :is_validated)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'user_id' => $data->getUserId(),
                'price' => $data->getPrice(),
                'coupon_id' => $data->getCouponId(),
                'address_id' => $data->getAddressId(),
                'is_in_delivery' => (int) $data->getIsInDelivery(),
                'is_validated' => (int) $data->getIsValidated()
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
}