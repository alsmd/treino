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



}