<?php
class User {
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private bool|null $isAdmin;
    private string $createdAt;

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

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getIsAdmin(): bool|null
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool|null $is_admin): void
    {
        $this->isAdmin = $is_admin;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->createdAt = $created_at;
    }

}