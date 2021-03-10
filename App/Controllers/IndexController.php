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
        $perPage = 8;
        $pagAtual= isset($_GET['page'])? $_GET['page'] : 1;
        $pular=($pagAtual - 1) * $perPage;
        $this->view->episodios = $episodio->limit($perPage)->offset($pular)->get();
        if(isset($_GET['tipo'])){
            $this->view->episodios = $episodio->join('anime','anime.id','episodio.fk_id_anime')->where('anime.tipo',$_GET['tipo'])->limit($perPage)->offset($pular)->get();
        }
        $this->render("index.home","layout");
    }


}