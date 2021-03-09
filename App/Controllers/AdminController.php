<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use \App\Connection;

class AdminController extends Action{
    public function __construct(){
        $this->view = new \stdClass;
        if(!(authAdmin())){
            header('Location:/?mensagem=area apenas para administradores');
        }
    }
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