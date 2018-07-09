<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 16:02
 */

namespace App\Controller;

use App\Panier;

class PanierController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadModel('Article');
        $ids = [];
        foreach (Panier::getInstance() as $id => $value)
            $ids [] = $id;
        $items = [];
        if (!empty($ids)) {
            $items = $this->Article->find($ids);
        }
        $this->render('panier.index', compact('items'));
    }
}