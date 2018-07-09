<?php
$panier = \App\Panier::getInstance();
$coutTotal = 0;
?>
<div class="container">
    <h1 class="text-center">Votre Panier</h1>
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

        <?php foreach ($items as $item) :
        ?>

        <tr>
            <td>
                <img height="60" src="<?= $item->link; ?>">
            </td>
            <td>
                <?= $item->description; ?>
            </td>
            <td>
                <?= $panier[$item->id]; ?>
            </td>
            <td>
                <?= $item->quantity; ?>
            </td>
            <td class="text-right">
                <?= $item->price * $panier[$item->id] .'€'; ?>
            </td>
        </tr>

        <?php
            $coutTotal += $item->price * $panier[$item->id];
        endforeach; ?>


        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><?= $coutTotal .'€'; ?></td>
            </tr>
        </tfoot>
    </table>

    <p class="text-right"><a class="btn btn-success" role="button" href="?page=panier.valider">Valider votre panier</a></p>
</div>
