<div class="container">

    <h2 class="text-center" style="margin-bottom: 50px;">Récapitulatif de votre commande</h2>

    <?php if(!empty($articlesIndisponibles)) :
        ?>
    <div style="float: left; max-width: 45%;">
        <h3>Nous ne pouvons honorer les quantités commandées pour les produits suivants :</h3>
        <p>Ils ont donc été retiré de votre commande.</p>
        <ul>
            <?php foreach ($articlesIndisponibles as $articleIndisponible) :
                ?>

                <li><?= $articleIndisponible->description; ?></li>
            <?php endforeach;
            ?>

        </ul>

        <?php if(!empty($errors)) :
            ?>

            <ul class="alert alert-danger">
                <?php foreach ($errors as $error) :
                    ?>

                    <li><?= $error; ?></li>
                <?php endforeach; ?>

            </ul>
        <?php endif; ?>
    </div>
    <?php endif;
    ?>

    <?php if(!empty($articlesValides)) :
        ?>

    <div style="float: right; text-align: right;">
        <h3>Imprimer votre facture</h3>
        <a class="btn btn-default"href="?page=commande.toPdf&amp;id=<?= $idCommande; ?>"><span class="glyphicon glyphicon-print"></span>&nbsp;PDF</a>
    </div>

    <?php $coutTotal = 0; ?>

    <div style="clear: both; padding-top: 30px; margin-bottom: 20px;">
        <h3 class="text-center">Merci de vos achats et à bientôt</h3>
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
    </div>
    <?php endif; ?>


</div>
