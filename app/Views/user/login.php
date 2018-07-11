<div class="container">

    <h2 class="text-center" style="margin-bottom: 40px;">Identification</h2>

    <form method="post">
        <?= $form->input('login', 'Login', ['class' => 'input-lg']); ?>

        <?= $form->input('password', 'mot de passe', ['type' => 'password', 'class' => 'input-lg']); ?>

        <?= $form->submit('Envoyer', ['class' => ['btn', 'btn-primary', 'btn-lg']]); ?>

    </form>

    <?php if ($errors) :?>

        <div class="alert alert-danger">
            Le nom d'utilisateur et/ou le mot de passe sont incorrects.
        </div>
    <?php endif; ?>
</div>