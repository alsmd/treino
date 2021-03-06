<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Episodio;
use App\Models\Anime;
use \App\Connection;

class IndexController extends Action{
    public function index(){
        $episodio = new Episodio;
        $this->view->anime = new Anime;
        $this->view->episodios = $episodio->get();
        $this->render("index.home","layout");
    }


}