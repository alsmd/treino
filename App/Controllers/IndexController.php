<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Episodio;
use App\Models\Anime;
use \App\Connection;

class IndexController extends Action{
    public function index(){
        $episodio = new Episodio(Connection::getDb());
        $this->view->anime = new Anime(Connection::getDb());
        $this->view->episodios = $episodio->read();
        $this->render("index.home","layout");
    }


}