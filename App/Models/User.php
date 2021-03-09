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
            header("Location:/?mensagem=email ja existe");
        }
        if($this->save()){
            header("Location:/?mensagem=conta criado com sucesso");
        }else{
            header("Location:/?mensagem=erro ao criar a conta");
        }
    }

    public function autenticarUser(){
        $user = $this->where('email',$this->email)->first();
        $user_not_exists = !(count($user));
        if($user_not_exists){
            header("Location:/?mensagem=usuario nao cadastrado");
        }
        if($user->password == $this->password){
            $_SESSION['email'] = $this->email;
            $_SESSION['nome'] = $this->nome;
            header("Location:/?mensagem=logado com sucesso");
        }else{
            header("Location:/?mensagem=senha nao corresponde ao email digitado");
        }
    }
}