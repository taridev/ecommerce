
<div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;">
    <?php foreach ($categories as $category) :
        ?>

        <div class="category category-<?= $category->name; ?>">
            <h3 class="text-center" style="line-height: 40px;"><a href="?page=article.filter&amp;name=<?= $category->name; ?>"><?= $category->name; ?></a></h3>
        </div>
    <?php endforeach; ?>

</div>

<div style="margin-top: 20px;">
    <?php foreach ($articles as $article) :
        ?>

        <div class="container-overlay col-ld-2 col-md-3 col-sm-6 col-xs-12 text-center" style="margin-top: 20px;">
            <img src="<?= $article->link; ?>" alt="aperçu produit" class="image" width="200">
            <p><?= $article->description; ?></p>
            <p><?= $article->price; ?></p>
            <p class="text-center">
                <a href="?page=panier.add&amp;id=<?= $article->id; ?>" class="btn btn-warning" role="button">Ajouter au panier</a>
            </p>
        </div>
    <?php endforeach; ?>

</div>
