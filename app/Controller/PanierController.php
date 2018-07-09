<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 16:02
 */

namespace App\Controller;

use App\Panier;

class PanierController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadModel('Article');
        $ids = [];
        foreach (Panier::getInstance() as $id => $value)
            $ids [] = $id;
        $items = [];
        if (!empty($ids)) {
            $items = $this->Article->find($ids);
        }
        $this->render('panier.index', compact('items'));
    }

    public function add() {
        $panier = new Panier();
        $this->loadModel('Article');
        $article = $this->Article->find($_GET['id']);
        if ($article and $article->quantity > 0) {
            $panier->addArticle($_GET['id']);
            $this->Article->update(
                $_GET['id'],
                ['quantity' => $article->quantity - 1]
            );
            header('location: ?page=panier.index');
        } elseif (!$article) {
            $errors [] = 'Impossible de trouver le produit recherché.';
        } else {
            $errors [] = 'Désolé nous sommes actuellement en rupture de stock pour le produit demandé.';
        }
        $this->render('panier.error', compact('errors'));
    }

    public function valider()
    {
        $panier = new Panier();
        $panier->reinit();
        $this->render('panier.confirmation');
    }
}