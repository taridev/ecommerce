<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 10:39
 * Ce fichier sert de FrontController au site. C'est l'élément d'entrée, il
 * oriente (routage) la navigation.
 */

require_once 'definition.php';
require_once ROOT . '/app/App.php';

use App\App;

App::load();

/*
 * Analyse de l'url, on s'attend à recevoir une adresse du type :
 * ?page=[module].[vue]
 */
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'article.index';
}

/* Parsing de la page */
$page = explode('.', $page);



/* On vérifie avant tout que l'application dispose du module demandé */
if (!empty($page[0]) and App::getInstance()->isModule($page[0])) {
    $controller = '\\App\\Controller\\' . ucfirst($page[0]) . 'Controller';
} else {
    $controller = '\\App\\Controller\\AppController';
}

$controller = new $controller();
$vue = isset($page[1]) ? $page[1] : 'notfound';

/* On vérifie que la vue existe dans le controlleur */
if (is_callable(array($controller, $vue))) {
    $controller->$vue();
} else {
    $controller->moduleNotFound();
}
