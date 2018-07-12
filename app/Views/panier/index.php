<?php
$panier = \App\Panier::getInstance();
$coutTotal = 0;
?>
<div class="container">
    <h2 class="text-center" style="margin-bottom: 40px;">Votre Panier</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Aperçu</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Quantité en stock</th>
                <th class="text-right">Coût total</th>
            </tr>
        </thead>

        <?php foreach ($articles as $article) :
        ?>

        <tr>
            <td>
                <img height="60" src="<?= $article->link; ?>">
            </td>
            <td>
                <?= $article->description; ?>
            </td>
            <td>
                <a href="?page=panier.del&amp;id=<?= $article->id; ?>" class="btn btn-default btn-xs">&#x2D;</a>&nbsp;<?= $panier[$article->id]; ?>&nbsp;<a href="?page=panier.add&amp;id=<?= $article->id; ?>" class="btn btn-default btn-xs">+</a>
            </td>
            <td>
                <?= $article->quantity; ?>
            </td>
            <td class="text-right">
                <?= $article->price * $panier[$article->id] .'€'; ?>
            </td>
        </tr>

        <?php
            $coutTotal += $article->price * $panier[$article->id];
        endforeach; ?>


        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><?= $coutTotal .'€'; ?></td>
            </tr>
        </tfoot>
    </table>

    <p class="text-right"><a class="btn btn-success" role="button" href="?page=commande.create">Valider votre panier</a></p>
</div>
