<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 12/07/2018
 * Time: 20:09
 */

namespace App\Table;


use Core\Table\Table;

class CommandeArticleTable extends Table
{
    protected $table = 'article_commande';

    public function find($id)
    {
        return $this->query(
            "SELECT * FROM ". $this->table . " WHERE ". $this->table .".id_commande = ?",
            [$id]
        );
    }
}