
<div class="container">
    <?php foreach ($items as $article) :
        ?>

        <div class="container-overlay col-md-3 col-sm-4 col-xs-6 text-center">
            <img src="<?= $article->link; ?>" alt="aperçu produit" class="image" width="200">
            <p><?= $article->description; ?></p>
            <p><?= $article->price; ?></p>
            <p class="text-center">
                <a href="?page=article.add&amp;id=<?= $article->id; ?>" class="btn btn-success" role="button">Ajouter au panier</a>
            </p>
        </div>
    <?php endforeach; ?>

</div>
