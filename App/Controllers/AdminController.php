<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use \App\Connection;

class AdminController extends Action{
    public function index(){
        $this->render('admin','layout');
    }

    public function controlarAcao($parametros){
        $classe = 'App\Controllers\\'.ucfirst($parametros[2]) . 'Controller';
        $acao = $parametros[3];
        $instancia = new $classe;
        $instancia->$acao();
    }


}