<?php
class VerifyClass
{
    protected $password;
    protected $firstname;
    protected $lastname;
    protected $email;
    public function __construct(string $password, string $email, string $firstname, string $lastname)
    {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
    }
    public function setPassword($data): bool
    {
        if (strlen($data) >= 8) {
            $this->password = $data;
            return true;
        }
        echo "Veuillez rentrer un mot de passe d'au minimum 8 caractères";
        return false;
    }
    public function getPassword(): void
    {
        echo $this->password;
    }
    public function setFirstname($data): bool
    {
        if (!empty($data)) {
            $this->firstname = $data;
            return true;
        }
        echo 'Veuillez renseigner votre prénom';
        return false;
    }
    public function getFirstname(): void
    {
        echo $this->firstname;
    }
    public function setLastname($data): bool
    {
        if (!empty($data)) {
            $this->lastname;
            return true;
        }
        echo 'Veuillez renseigner votre nom';
        return false;
    }
    public function getLastname(): void
    {
        echo $this->lastname;
    }
    public function setEmail($data): bool
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            echo "Veuillez rentrer une adresse mail valide";
            return false;
        } else {
            $this->email = $data;
            return true;
        }
    }
    public function getEmail(): void
    {
        echo $this->email;
    }
}