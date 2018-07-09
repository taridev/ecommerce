<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 10:39
 */

require_once 'definition.php';
require_once ROOT . '/app/App.php';

use App\App;

App::load();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'article.index';
}

$page = explode('.', $page);

if ($page[0] == 'admin' and count($page) == 2) {

} else {
    $controller = '\\App\\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

$controller = new $controller();
$controller->$action();
