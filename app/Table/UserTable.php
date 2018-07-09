<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 13:46
 */

namespace App\Table;


use Core\Table\Table;

class UserTable extends Table
{
    protected $table = 'user';

    public function get($login) {
        return $this->query('SELECT * FROM '. $this->table .' WHERE last_name = "' .$login .'"');
    }
}