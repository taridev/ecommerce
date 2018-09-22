<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 11:32
 */

namespace App\Entity;

use Core\Entity\Entity;

class ArticleEntity extends Entity
{
    public $id;
    public $description;
    public $price;
    public $link;
}