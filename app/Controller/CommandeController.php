<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 12/07/2018
 * Time: 19:16
 */



namespace App\Controller;


use App\App;
use App\Panier;
use App\Service\AuthService;
use App\Service\CommandeService;
use Core\Auth\Auth;

class CommandeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        // Chargement du DAO d'article
        $this->loadModel('Commande');
        $this->loadModel('CommandeArticle');
    }

    public function create()
    {
        if (AuthService::logged() and !empty(Panier::getInstance())) {
            $this->loadModel('Article');
            $this->Commande->create(['id_user' => AuthService::id()]);
            $idCommande = App::getInstance()->getDb()->lastInsertId();

            $errors = [];
            $articlesValides = [];
            $articlesIndisponibles = [];

            foreach (Panier::getInstance() as $idArticle => $quantiteCommande) {
                $article = $this->Article->find($idArticle);
                if ($article and $article->quantity >= $quantiteCommande) {
                    $this->CommandeArticle->create([
                        'id_commande' => $idCommande,
                        'id_article' => $idArticle,
                        'quantite' => $quantiteCommande
                    ]);
                    // Pour chaque article valide on stock l'article et sa qantité
                    $articlesValides [] = [
                        'article' => $article,
                        'quantity' => $quantiteCommande
                    ];
                    // et on met à jour la quantité en base de données en soustrayant la quantité demandée
                    $this->Article->update(
                        $idArticle,
                        ['quantity' => $article->quantity - $quantiteCommande]
                    );
                } elseif ($article) {
                    $articlesIndisponibles [] = $article;
                } else {
                    $errors [] = "La référence au produit ". $idArticle ." est introuvable";
                }
            }
            // Au final on réinitialise le panier
            Panier::reinit();
            // On appelle la méthode render(vue) qui se charge de mettre en forme les données.
            $this->render('commande.create', compact('errors', 'articlesValides', 'articlesIndisponibles', 'idCommande'));
        } else {
            header('Location: ?page=user.login');
        }
    }

    public function toPdf()
    {
        if (!AuthService::logged() or empty($_GET['id'])) {
            header('Location: .');
        }
        $ids = [];
        $articlesCommandes = $this->CommandeArticle->find($_GET['id']);
        foreach ($articlesCommandes as $articles) {
            $ids [] = $articles->id_article;
        }
        $this->loadModel('Article');
        $articles = $this->Article->find($ids);
        foreach ($articles as $article) {
            foreach ($articlesCommandes as $articleCommande) {
                if ($article->id === $articleCommande->id_article) {
                    $article->quantity = $articleCommande->quantite;
                }
            }
        }
        CommandeService::toPdf($articles);
    }
}