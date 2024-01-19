<?php

class Manager
{
    private PDO $bdd;

    public function __construct(PDO $database_connection)
    {
        $this->bdd = $database_connection;
    }


    public function createUser(User $user): int
    {
        if ($user instanceof User) {
            $query = "INSERT INTO users (id, firstname, lastname, email, password, is_admin) VALUES (null, :firstname, :lastname, :email, :password, :is_admin)";
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

    public function getUser(int $user_id)
    {
        $query = "SELECT * FROM users WHERE id=:id";
        $response = $this->bdd->prepare($query);
        $response->execute([
            'id' => $user_id
        ]);
        return $response->fetch();
    }

    public function getAllUsers(): array|null
    {
        $query = "SELECT * FROM users";
        $response = $this->bdd->query($query);
        return $response->fetchAll();
    }

    public function editUser(User $user)
    {
        echo "editUser";
    }

    public function deleteUser(int $user_id)
    {
        $query = "DELETE FROM users WHERE id = " . $user_id;
        $execute = $this->bdd->query($query);
        $execute->execute();
    }

    public function countUsers(): int
    {
        $query = "SELECT count(*) FROM users";
        $response = $this->bdd->query($query);
        return $response->fetchColumn();
    }

    public function exists(int $id)
    {
        echo "exists";
    }

}