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
        $this->categories = $this->Article->getCategories();
    }

    public function index()
    {
        $items = $this->Article->all();
        $categories = $this->categories;
        $this->render('article.index', compact('items', 'categories'));
    }

    public function filter()
    {
        $items = $this->Article->findByCategory($_GET['name']);
        $categories = $this->categories;
        $this->render('article.index', compact('items', 'categories'));
    }
}
