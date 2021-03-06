<?php

namespace App\Service;

class AuthService
{
    /**
     * Crée une session si le nom d'utilisateur et le mot de passe correspondent
     *
     * @param string id
     * @param string $username
     * @return boolean
     */
    public static function login($id, $username)
    {
        $_SESSION['auth']['id'] = $id;
        $_SESSION['auth']['username'] = $username;
        return true;
    }

    public static function logged()
    {
        return isset($_SESSION['auth']);
    }

    public static function username()
    {
        return $_SESSION['auth']['username'];
    }

    public static function id()
    {
        return $_SESSION['auth']['id'];
    }

    public static function logout()
    {
        session_destroy();
    }

    public static function checkRegisterForm()
    {
        $errors = [];

        if (isset($_POST['login'], $_POST['password'], $_POST['confirmation'])) {
            if (empty($_POST['login'])) {
                $errors [] = 'Vous devez spécifier un nom d\'utilisateur.';
            }
            if (empty($_POST['password'])) {
                $errors [] = 'Vous ne pouvez pas avoir un mot de passe vide.';
            }
            if (strcmp($_POST['password'], $_POST['confirmation']) != 0) {
                $errors [] = 'les mots de passe ne correspondent pas';
            }
        }

        return $errors;
    }
}
