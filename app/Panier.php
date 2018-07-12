<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 14:26
 */

namespace App;


class Panier
{
    public static function getInstance()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        return $_SESSION['panier'];
    }

    public static function addArticle($articleId)
    {
        if (isset($_SESSION['panier'][$articleId])) {
            $_SESSION['panier'][$articleId] ++;
        } else {
            $_SESSION['panier'][$articleId] = 1;
        }
    }

    public static function removeArticle($articleId)
    {
        if (isset($_SESSION['panier'][$articleId]) and $_SESSION['panier'][$articleId] > 1) {
            $_SESSION['panier'][$articleId] --;
        } elseif (isset($_SESSION['panier'][$articleId]) and $_SESSION['panier'][$articleId] == 1) {
            unset($_SESSION['panier'][$articleId]);
        }
    }

    public static function reinit()
    {
        $_SESSION['panier'] = null;
    }
}