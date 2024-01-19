<?php
class Food {
    private int $id;
    private string $name;
    private int $lipid;
    private int $protein;
    private int $carbohydrate;
    private int $weight;
    private bool|null $isHidden;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLipid(): int
    {
        return $this->lipid;
    }

    public function setLipid(int $lipid): void
    {
        $this->lipid = $lipid;
    }

    public function getProtein(): int
    {
        return $this->protein;
    }

    public function setProtein(int $protein): void
    {
        $this->protein = $protein;
    }

    public function getCarbohydrate(): int
    {
        return $this->carbohydrate;
    }

    public function setCarbohydrate(int $carbohydrate): void
    {
        $this->carbohydrate = $carbohydrate;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getIsHidden(): ?bool
    {
        return $this->isHidden;
    }

    public function setIsHidden(?bool $isHidden): void
    {
        $this->isHidden = $isHidden;
    }


}