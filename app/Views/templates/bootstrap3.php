<?php
use App\Service\AuthService;

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="css/<?= $this->getTemplate() . '.css'; ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title><?= \App\App::getInstance()->title; ?></title>

</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="."><?= \App\App::getInstance()->title; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                $nav = [
                    'article' =>
                        (!isset($_GET['page'])
                            or explode('.', $_GET['page'])[0] == 'article') ? ' class="active"' : '',
                    'panier' =>
                        (isset($_GET['page'])
                            and explode('.', $_GET['page'])[0] == 'panier') ? ' class="active"' : ''
                ];
                ?>

                <?php foreach ($nav as $label => $class) :
                    ?>
                 <li<?= $class; ?>><a href="?page=<?= $label . '.index'; ?>"><?= ucfirst($label); ?></a></li>

                <?php endforeach; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!AuthService::logged()) :
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <b>Login</b>
                            <span class="caret"></span>
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" method="post"
                                              action="?page=user.login"
                                              accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label for="login">Login</label>
                                                <input type="text" class="form-control" id="login"
                                                       name="login" placeholder="nom d'utilisateur" required="required" autofocus="autofocus">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                       name="password" placeholder="mot de passe" required="required">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block btn-md">
                                                    Connexion
                                                </button>
                                                <p class="text-right" style="margin-top: 10px;">
                                                    <a href="?page=user.register">
                                                        Créer un compte
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php else :
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <b><span class="glyphicon glyphicon-user"></span>&nbsp;<?= AuthService::username(); ?></b>
                            <span class="caret"></span>
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <ul class="col-md-12 list-unstyled" style="margin-bottom: 10px;">
                                        <li>
                                            <a class="btn btn-danger btn-block btn-md" href="?page=user.logout">
                                                <span class="glyphicon glyphicon-off"></span>&nbsp;Déconnexion
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<main>

    <div>
        <?= $content; ?>

    </div>

</main>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>