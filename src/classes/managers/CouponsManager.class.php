<?php
class CouponsManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Coupons) {
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
        // TODO: Implement editOne() method.
        echo "Editing to implement";
    }
}