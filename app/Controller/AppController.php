<?php

namespace App\Controller;

use App\Table\CategoryTable;
use Core\Controller\Controller;
use App\App;

class AppController extends Controller
{
    protected $viewPath;
    protected $template = 'bootstrap3';
    protected $nav = [];

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Méthode qui permet d'accéder au DAO demandé
     * @param $model_name
     * @return \App\Table\
     */
    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    public function moduleNotFound()
    {
        $this->render('app.404');
        exit();
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $this->render('access.forbidden');
        exit();
    }
}
