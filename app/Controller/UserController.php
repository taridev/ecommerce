<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 13:42
 */

namespace App\Controller;

use App\Service\AuthService;
use Core\HTML\BootstrapForm;

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function login()
    {
        if (AuthService::logged()) {
            header('Location: .');
        }
        $errors = false;
        if (isset($_POST['login'], $_POST['password'])) {
            $result = $this->User->get($_POST['login'], null, true);
            if ($result and strcmp(sha1($_POST['password']), $result->password) === 0) {
                AuthService::login($result->id, $result->username);
                $this->render('user.loginConfirmation');
                exit();
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('user.loginForm', compact('form', 'errors'));
    }

    public function register() {
        if (AuthService::logged()) {
            header('Location: .');
        }

        $form = new BootstrapForm($_POST);

        if (isset($_POST['login'], $_POST['password'], $_POST['confirmation'])) {

            $errors = AuthService::checkRegisterForm();

            if ($this->User->get($_POST['login'], null, true)) {
                $errors [] = 'Le nom d\'utilisateur est déjà pris.';
                $this->render('user.registerForm', compact('errors', 'form'));
                exit();
            }

            if (empty($errors)) {
                $this->User->create([
                    'username' => $_POST['login'],
                    'password' => sha1($_POST['password']),
                ]);
                AuthService::login($_POST['login']);
                $this->render('user.registerConfirmation');
                exit();
            }

        }
        $this->render('user.registerForm', compact('form'));
    }

    public function logout()
    {
        AuthService::logout();
        header('Location: .');
    }
}