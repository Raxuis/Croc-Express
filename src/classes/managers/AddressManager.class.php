<?php

class AddressManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Address) {
            $query = "INSERT INTO address (user_id, street, zip, city, country) VALUES (:user_id, :street, :zip, :city, :country)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'user_id' => $data->getUserId(),
                'street' => $data->getStreet(),
                'zip' => $data->getZip(),
                'city' => $data->getCity(),
                'country' => $data->getCountry()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        return;
    }
}
