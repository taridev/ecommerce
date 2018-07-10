<div class="container">
    <?php $coutTotal = 0; ?>
    <?php if(!empty($errors)) :
    ?>

    <ul class="alert alert-danger">
        <?php foreach ($errors as $error) :
        ?>

        <li><?= $error; ?></li>
        <?php endforeach; ?>

    </ul>
    <?php endif;
    ?>

    <?php if(!empty($articlesValides)) :
    ?>

    <h3 class="text-center">Récapitulatif de votre commande</h3>
    <h4 class="text-center">Merci de vos achats et à bientôt</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Aperçu</th>
            <th>Description</th>
            <th>Quantité</th>
            <th class="text-right">Coût total</th>
        </tr>
        </thead>

        <?php foreach ($articlesValides as $articleValide) :
            ?>

            <tr>
                <td>
                    <img height="60" src="<?= $articleValide['article']->link; ?>">
                </td>
                <td>
                    <?= $articleValide['article']->description; ?>
                </td>

                <td>
                    <?= $articleValide['quantity']; ?>
                </td>
                <td class="text-right">
                    <?= $articleValide['article']->price * $articleValide['quantity'] .'€'; ?>
                </td>
            </tr>

            <?php
            $coutTotal += $articleValide['article']->price * $articleValide['quantity'];
        endforeach; ?>


        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><?= $coutTotal .'€'; ?></td>
        </tr>
        </tfoot>
    </table>
    <?php endif; ?>

    <?php if(!empty($articlesIndisponibles)) :
        ?>

        <h4 class="text-center">Nous ne pouvons honorer les quantités commandées pour les produits suivants. Ils ont donc été retiré de votre commande.</h4>
        <ul>
            <?php foreach ($articlesIndisponibles as $articleIndisponible) :
                ?>

                <li><?= $articleIndisponible->description; ?></li>
            <?php endforeach;
            ?>

        </ul>
    <?php endif;
    ?>


</div>
