<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use \App\Connection;

class AnimeController extends Action{
    public function index(){
    }
    public function search(){
        $anime_class = new Anime(Connection::getDB());
        $animes = $anime_class->filter($_POST['filter']);
        $this->view->animes = $animes;
        $this->render('model1','layout');
    }

    /*Cruds*/
    public function gerenciar(){
        $this->view->adminPageAtual = 'anime.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $this->view->adminPageAtual = 'anime.edite';
        $this->render('admin','layout');
    }
    public function save(){
        print_r($_POST);
    }
    public function update(){

    }
    public function delete(){

    }


}