<?php
namespace App\Models;

class Auth {

    public static function auth($row): void
    {
        $_SESSION['USER'] = $row['id'];
    }
    public static function logout(): void
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }

    public static function isLoggedIn(): bool
    {
        if (isset($_SESSION['USER'])) {
            return true;
        }
        return false;
    }
}