<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 11:18
 */

namespace App\Controller;


class ArticleController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        // Chargement du DAO d'article
        $this->loadModel('Article');
    }

    /**
     * Permet d'aficher tous les articles
     */
    public function index()
    {
        // Chargements de tous les articles depuis le DAO
        $articles = $this->Article->all();
        // Chargements de toutes les catégories depuis le DAO
        $categories = $this->Article->getCategories();
        // Envoi à la vue article/index.php des données collectées ($categories et $articles)
        $this->render('article.index', compact('articles', 'categories'));
    }

    /**
     * Permet de filtrer les articles en fonction d'une catégorie
     */
    public function filter()
    {
        $articles = $this->Article->findByCategory($_GET['name']);
        $categories = $this->Article->getCategories();
        $this->render('article.index', compact('articles', 'categories'));
    }
}
