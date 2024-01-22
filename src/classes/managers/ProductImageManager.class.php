<?php

class ProductImageManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof ProductImage) {
            $query = "INSERT INTO products_images (product_id, image) VALUES (:product_id, :image)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'product_id' => $data->getProductId(),
                'image' => $data->getImage()
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
}