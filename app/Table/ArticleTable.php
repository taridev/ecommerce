<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 11:30
 */

namespace App\Table;

use Core\Table\Table;

class ArticleTable extends Table
{
    protected $table = 'article';

    /**
     * Récupère la liste des articles
     *
     * @return \App\Entity\ArticleEntity
     */
    public function all()
    {
        return $this->query('SELECT * FROM '. $this->table);
    }

    /**
     * Récupère un article
     *
     * @param int $id
     * @return \App\Entity\ArticleEntity
     */
    public function find($id)
    {
        if (is_array($id)) {
            $ids = '('. implode(',', $id) .')';
            return $this->query('SELECT * FROM ' . $this->table . ' WHERE id IN '. $ids);
        }
        return $this->query(
            "SELECT * FROM ". $this->table . " WHERE id=?",
            [$id],
            true
        );
    }

    /**
     * Récupère la liste des catégories
     *
     * @return mixed un tableau contenant les noms des catégories
     */
    public function getCategories() {
        return $this->query(
            "SELECT DISTINCT SUBSTRING(link, LENGTH('images/') + 1, LOCATE('.php',link) - 2*LENGTH('.php')) AS name FROM ". $this->table
        );
    }

    public function findByCategory($category)
    {
        return $this->query('SELECT * FROM ' . $this->table . ' WHERE link like "%'. $category . '%"');
    }
}