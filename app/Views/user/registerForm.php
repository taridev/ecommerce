<div class="container">

    <h2 class="text-center" style="margin-bottom: 40px;">Création d'un compte sur eCommerçant</h2>

    <form method="post">
        <?= $form->input('login', 'Login', ['class' => 'input-lg', 'required' => 'required']); ?>

        <?= $form->input('password', 'mot de passe', ['type' => 'password', 'class' => 'input-lg', 'required' => 'required']); ?>

        <?= $form->input('confirmation', 'confirmation mot de passe', ['type' => 'password', 'class' => 'input-lg', 'required' => 'required']); ?>

        <?= $form->submit('Envoyer', ['class' => ['btn', 'btn-primary', 'btn-lg']]); ?>

    </form>

        <?php if (isset($errors) and !empty($errors)) : ?>

            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>

                        <li><?= $error; ?></li>

                    <?php endforeach; ?>
                </ul>
            </div>

        <?php endif; ?>

</div>