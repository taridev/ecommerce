<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 11:18
 */

namespace App\Controller;


use App\Panier;

class ArticleController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
    }

    public function index()
    {
        $items = $this->Article->all();
        $this->render('article.index', compact('items'));
    }

    public function add() {
        $panier = new Panier();
        $panier->addArticle($_GET['id']);
        header('location: ?page=panier.index');
    }
}
