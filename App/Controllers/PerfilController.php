<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\User;
use \App\Connection;

class PerfilController extends Action{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
        $this->view = new \stdClass;
        $nao_logado = !(authUser());
        if($nao_logado){
            header('Location:/');
            die();
        }
    }

    public function controlarAcao(){
        $this->view->perfilPageAtual = 'profile';
        $this->render('perfil.perfil','layout');
    }
}