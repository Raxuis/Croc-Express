<?php
require "Manager.class.php";

class UserManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $user): int
    {
        if ($user instanceof User) {
            $query = "INSERT INTO users (firstname, lastname, email, password, is_admin) VALUES (:firstname, :lastname, :email, :password, :is_admin)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'firstname' => $user->getFirstName(),
                'lastname' => $user->getLastname(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'is_admin' => $user->getIsAdmin(),
            ]);
        }

        $user->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $user): void
    {
        echo "editUser";
    }

}