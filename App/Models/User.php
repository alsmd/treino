<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent{
    protected $table = "users";
    protected $fillable = ["nome","email","password"];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function __constuct(){
        
    }


    public function saveNewUser(){
        $email_exists = count($this->where('email',$this->email)->get());

        if($email_exists){
            $_SESSION['mensagem'] = "email ja existe";
            $_SESSION['mensagem_type'] = "error";
            header("Location:/");

        }
        if($this->save()){
            $mensagem = "conta criado com sucesso";
            $mensagem_type = "success";
            $_SESSION['email'] = $this->email;
        }else{
            $mensagem = "erro ao criar a conta";
            $mensagem_type = "error";
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] =$mensagem_type;
        header("Location:/");
    }

    public function autenticarUser(){
        $user = $this->where('email',$this->email)->first();
        $user_not_exists = !(count($user));
        if($user_not_exists){
            $_SESSION['mensagem'] = "usuario nao cadastrado";
            $_SESSION['mensagem_type'] ="error";
            header("Location:/");
        }
        if($user->password == $this->password){
            $_SESSION['email'] = $this->email;
            $_SESSION['nome'] = $this->nome;
            $mensagem = "logado com sucesso";
            $mensagem_type = "success";
        }else{
            $mensagem = "senha nao corresponde ao email digitado";
            $mensagem_type = "error";
            header("Location:/?mensagem=senha nao corresponde ao email digitado");
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] =$mensagem_type;
        header("Location:/");
    }
}