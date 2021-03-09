<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\User;
use \App\Connection;

class LoginController extends Action{
    protected $user;
    public function index(){
        echo 'Pagina inicial Login';
    }

    public function __construct(User $user){
        $this->user = $user;
    }
    public function controlarAcao($parametros){
        $acao = $parametros[2];
        $this->$acao($_POST);
    }

    public function logar(){
        $this->user->email = $_POST['email'];
        $this->user->password = md5($_POST['password']);
        $this->user->autenticarUser();

    }
    public function registrar(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email_invalido = !($this->verificarEmail($email));
        $password_invalido = !($this->verificarPassword($password));
        if($email_invalido){
            header('Location:\\?mensagem=email invalido');
        }else if($password_invalido){
            header('Location:\\?mensagem=password invalido');
        }
        $this->user->email = $email;
        $this->user->password = md5($password);
        $this->user->saveNewUser();
    }
    public function sair(){
        session_destroy();
        header('Location:\\?mensagem=deslogado');
    }
    public function verificarPassword($password){
        return 
        preg_match("/[a-z]/",$password) &&
        preg_match("/[A-Z]/",$password) &&
        preg_match("/[0-9]/",$password) &&
        preg_match("/^[\w]{6,}$/",$password);
    }
    public function verificarEmail($email){
        return
        preg_match("/^[a-zA-Z0-9\d\._]+@[a-zA-Z0-9\d\._]+\.[a-zA-Z0-9\d\.]{2,}$/",$email);
    }
}