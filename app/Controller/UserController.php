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
        if (!empty($_POST) and isset($_POST['login']) and isset($_POST['password'])) {
            $auth = new Auth();
            $result = $this->User->get($_POST['login'], null, true);
            if ($result and strcmp(sha1($_POST['password']), $result->password) === 0) {
                $auth->login($_POST['login']);
                return header('Location: .');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('user.login', compact('form', 'errors'));
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
    }
}