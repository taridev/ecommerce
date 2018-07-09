<h2>Ooops Something went wrong !!!</h2>
<div class="alert alert-danger">
    <ul>
<?php foreach ($errors as $error) :
    ?>

        <li><?= $error; ?></li>
<?php endforeach; ?>
    </ul>
</div>