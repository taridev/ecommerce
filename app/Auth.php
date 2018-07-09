<?php

namespace App;

class Auth
{
    /**
     * Crée une session si le nom d'utilisateur et le mot de passe correspondent
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function login($username)
    {
        $_SESSION['auth'] = $username;
        return true;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    public function username()
    {
        return $_SESSION['auth'];
    }

    public function logout()
    {
        session_destroy();
        header('Location: .');
    }
}
