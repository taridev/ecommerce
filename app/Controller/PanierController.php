<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 16:02
 */

namespace App\Controller;

use App\Panier;
use App\Service\AuthService;

class PanierController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Méthode du controlleur appelée pour afficher le contenu du panier
     */
    public function index()
    {
        $this->loadModel('Article');
        $ids = [];
        $articles = [];
        foreach (Panier::getInstance() as $id => $value) {
            $ids [] = $id;
        }
        if (!empty($ids)) {
            $articles = $this->Article->find($ids);
        }
        $this->render('panier.index', compact('articles'));
    }

    /**
     * Méthode utilisée pour ajouter un article au panier
     */
    public function add() {
        $this->loadModel('Article');
        $article = $this->Article->find($_GET['id']);
        if ($article) {
            Panier::addArticle($_GET['id']);
            header('location: ?page=panier.index');
            return;
        }
        $errors [] = 'Impossible de trouver le produit recherché.';
        $this->render('panier.error', compact('errors'));
    }

    public function del() {
        $this->loadModel('Article');
        $article = $this->Article->find($_GET['id']);
        if ($article) {
            Panier::removeArticle($article->id);
        }
        header('location: ?page=panier.index');
    }

    /**
     * Méthode utilisée pour valider la commander
     */
    public function valider()
    {
        if (!AuthService::logged()) {
            header('Location: ?page=user.login');
            exit();
        }
        $panier = Panier::getInstance();

        // Si le panier est vide on retourne à l'index du panier
        if (empty($panier)) {
            header('location: ?page=panier.index');
            exit();
        }

        $this->loadModel('Article');
        $articlesIndisponibles = [];
        $articlesValides = [];
        $errors = [];

        // On parcourt le panier pour trouver les articles épuisés, inexistant ou valides
        foreach ($panier as $articleId => $articleQteDemandee) {
            $article = $this->Article->find($articleId);
            if (!$article) {
                // L'article est inexistant on récupère l'id pour en informer l'utilisateur
                $errors [] = "La référence au produit ". $articleId ." est introuvable";
            } elseif ($article->quantity < $articleQteDemandee) {
                // L'article est indisponible on le stock pour l'afficher dans la vue
                $articlesIndisponibles [] = $article;
            } else {
                // Pour chaque article valide on stock l'article et sa qantité
                $articlesValides [] = [
                    'article' => $article,
                    'quantity' => $articleQteDemandee
                ];
                // et on met à jour la quantité en base de données en soustrayant la quantité demandée
                $this->Article->update(
                    $articleId,
                    ['quantity' => $article->quantity - $articleQteDemandee]
                );
            }
        }
        // Au final on réinitialise le panier
        Panier::reinit();
        // On appelle la méthode render(vue) qui se charge de mettre en forme les données.
        $this->render('panier.confirmation', compact('errors', 'articlesValides', 'articlesIndisponibles'));
    }
}