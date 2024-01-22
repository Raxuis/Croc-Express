<?php
class MenuManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Menu) {
            $query = "INSERT INTO menus (name, price, is_hidden) VALUES (:name, :price, :is_hidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'price' => $data->getPrice(),
                'is_hidden' => (int) $data->getIsHidden()
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