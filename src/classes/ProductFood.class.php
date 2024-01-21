<?php
class ProductFood {

    private int $id;
    private int $productId;
    private int $foodId;

    public function __construct(array $props)
    {
        $this->hydrate($props);
    }

    public function hydrate(array $props): void
    {
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $prop) {
                // On défini le nom de la méthode que l'on souhaite appeler
                $method = "set" . ucfirst($key);

                // On vérifie si la méthode existe
                if (method_exists($this, $method)) {
                    // Si elle existe, on appelle la méthode et on lui passe en paramètre sa valeur associée
                    $this->$method($prop);
                }
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getFoodId(): int
    {
        return $this->foodId;
    }

    public function setFoodId(int $foodId): void
    {
        $this->foodId = $foodId;
    }

}