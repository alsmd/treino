<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Produto;
use \App\Connection;

class IndexController extends Action{
    public function index(){
        $produto = new Produto(Connection::getDb());
        $this->render("index.home","layout");
    }



}