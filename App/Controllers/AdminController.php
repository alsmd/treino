<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use \App\Connection;
use DI\Container;

class AdminController extends Action{
    public function __construct(){
        $this->view = new \stdClass;
        if(!(authAdmin())){
            $_SESSION['mensagem'] = 'area apenas para administradores';
            $_SESSION['mensagem_type'] = 'error';
            header('Location:/');
            die();//caso eu não mete minha aplicaçã minha view sera renderizada monstrando assim o toast e apagando as variaveis de sessão
        }
    }
    public function index(){
        $this->render('admin','layout');
    }

    public function controlarAcao($parametros){
        
        $classe = 'App\Controllers\\'.ucfirst($parametros[2]) . 'Controller';
        $acao = $parametros[3];
        $container = new Container;
        $instancia = $container->get($classe);
        $instancia->$acao();
    }


}