<?php
require "Manager.class.php";

class UserManager extends Manager {

    public function __construct(PDO $database_connection, string $table)
    {
        parent::__construct($database_connection, $table);
    }

    public function createOne(object $data): int
    {
        if ($data instanceof User) {
            $query = "INSERT INTO users (firstname, lastname, email, password, is_admin) VALUES (:firstname, :lastname, :email, :password, :is_admin)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'firstname' => $data->getFirstName(),
                'lastname' => $data->getLastname(),
                'email' => $data->getEmail(),
                'password' => $data->getPassword(),
                'is_admin' => $data->getIsAdmin(),
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $user): void
    {
        echo "editUser";
    }

}