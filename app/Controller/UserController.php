<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 13:42
 */

namespace App\Controller;

use Core\HTML\BootstrapForm;
use App\Auth;

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function login()
    {
        $errors = false;
        if (!empty($_POST) and isset($_POST['login'], $_POST['password'])) {
            $result = $this->User->get($_POST['login'], null, true);
            if ($result and strcmp(sha1($_POST['password']), $result->password) === 0) {
                Auth::login($_POST['login']);
                return header('Location: .');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('user.login', compact('form', 'errors'));
    }

    public function register() {
        if(Auth::logged()) {
            header('Location: .');
        }

        $form = new BootstrapForm($_POST);
        $errors = [];
        $success = false;

        if (isset($_POST['login'], $_POST['password'], $_POST['confirmation'], $_POST['mail'])) {
            if (empty($_POST['login'])) {
                $errors [] = 'Vous devez spécifier un nom d\'utilisateur.';
            }
            if (empty($_POST['password'])) {
                $errors [] = 'Vous ne pouvez pas avoir un mot de passe vide.';
            }
            if (strcmp($_POST['password'], $_POST['confirmation']) != 0) {
                $errors [] = 'les mots de passe ne correspondent pas';
            }
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $errors [] = 'L\'adresse founie n\'est pas une adresse email valide';
            }
            if ($this->User->get($_POST['login'], null, true)) {
                $errors [] = 'Le nom d\'utilisateur est déjà pris.';
                $this->render('user.register', compact('errors', 'form'));
            }
            if (empty($errors)) {
                $this->User->create([
                    'last_name' => $_POST['login'],
                    'password' => sha1($_POST['password']),
                    'email' => $_POST['mail']
                ]);
                Auth::login($_POST['login']);
                $success = true;
            }
        }
        $this->render('user.register', compact('errors', 'form', 'success'));
    }

    public function logout()
    {
        Auth::logout();
    }
}