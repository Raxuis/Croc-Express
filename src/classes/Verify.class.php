<?php

class Verify
{
    public static function verifyPassword($password, $passwordConfirmation): bool
    {
        if (strcmp($password, $passwordConfirmation) === 0) {
            if (strlen($password) >= 8) {
                return true;
            }
        }
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