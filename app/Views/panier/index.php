<?php
$panier = \App\Panier::getInstance();
$coutTotal = 0;
?>
<h1 class="text-center">Votre Panier</h1>
<table class="table">
    <thead>
    <tr>
        <th>Aperçu</th>
        <th>Description</th>
        <th>Quantité</th>
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
        <td class="text-right">
            <?= $item->price * $panier[$item->id]; ?>
        </td>

        <?php
            $coutTotal += $item->price * $panier[$item->id];
        endforeach; ?>


        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><?= $coutTotal .'€'; ?></td>
            </tr>
        </tfoot>
</table>
