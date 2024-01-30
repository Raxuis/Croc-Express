<?php
class CategoryManager extends Manager
{

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof Category) {
            echo $data->getIsHidden();

            $query = "INSERT INTO categories (name, description, image, is_hidden) VALUES (:name, :description,:image, :is_hidden)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'description' => $data->getDescription(),
                'image' => $data->getImage(),
                'is_hidden' => (int) $data->getIsHidden()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        if ($data instanceof Category) {
            $query = "UPDATE categories SET name = :name, description = :description, image=:image, is_hidden = :is_hidden WHERE id = :id";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'name' => $data->getName(),
                'description' => $data->getDescription(),
                'is_hidden' => (int) $data->getIsHidden(),
                'image' => $data->getImage(),
                'id' => $data->getId()
            ]);
        }
    }

    public function toggleHide(int $id): void
    {
        $query = "UPDATE categories SET is_hidden = NOT is_hidden WHERE id = :id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'id' => $id
        ]);
    }
}