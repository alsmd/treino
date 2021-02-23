<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Produto;
use \App\Connection;

class AnimeController extends Action{
    public function index(){
        $this->render('model1','layout');
    }
    public function genero(Array $genero){

    }



}