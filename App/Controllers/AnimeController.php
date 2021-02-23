<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Produto;
use \App\Connection;

class AnimeController extends Action{
    public function index(){
        echo 'Pagina inicial Anime';
        //$produto = new Produto(Connection::getDb());
        //$this->render("index.home","layout");
    }
    public function genero(Array $genero){
        echo 'Pagina inicial Anime Genero';
        print_r($genero);
       /*  $produto = new Produto(Connection::getDb());
        $this->render("index.home","layout"); */
    }



}