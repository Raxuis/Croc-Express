<?php

class CouponsManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Coupon) {
            $query = "INSERT INTO coupons (name, reduction) VALUES (:name, :reduction)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'reduction' => $data->getReduction()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {

        $query = "UPDATE coupons SET name = :name, reduction = :reduction WHERE id = :id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'name' => $data->getName(),
            'reduction' => $data->getReduction(),
            'id' => $data->getId()
        ]);

    }

    public function getOneByName(string $coupon): array|bool
    {
        $query = "SELECT * FROM coupons WHERE name = :name";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'name' => $coupon
        ]);
        return $response->fetch(PDO::FETCH_ASSOC);
    }
}