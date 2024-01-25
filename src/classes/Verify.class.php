<?php

class Verify
{
    public static function verifyPassword($data): bool
    {
        if (strcmp($_POST['password'], $_POST['password_confirmation']) === 0) {
            if (strlen($data) >= 8) {
                return true;
            }
        }

        echo "Mot de passe incorrect : 8 caractères minimum";
        return false;
    }

    public static function verifyFirstname($data): bool
    {
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public static function verifyLastname($data): bool
    {
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public static function verifyEmail($data): bool
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            echo "Veuillez rentrer une adresse mail valide";
            return false;
        } else {
            return true;
        }
    }
}