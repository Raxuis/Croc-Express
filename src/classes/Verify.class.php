<?php

class Verify
{
    public function verifyPassword($data): bool
    {
        if (strcmp($_POST['password'], $_POST['password_confirmation']) === 0) {
            if (strlen($data) >= 8) {
                return true;
            }
        }

        echo "Mot de passe incorrect : 8 caractères minimum";
        return false;
    }

    public function verifyFirstname($data): bool
    {
        if (!empty($data)) {
            return true;
        }
        echo 'Veuillez renseigner votre prénom';
        return false;
    }

    public function verifyLastname($data): bool
    {
        if (!empty($data)) {
            return true;
        }
        echo 'Veuillez renseigner votre nom';
        return false;
    }

    public function verifyEmail($data): bool
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            echo "Veuillez rentrer une adresse mail valide";
            return false;
        } else {
            return true;
        }
    }
}