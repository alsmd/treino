<?php
use App\Models\User;
function get_auth_user(){
    if(isset($_SESSION['email'])){
        return User::where('email',$_SESSION['email'])->first();
    }else{
        return null;
    }
}
function authAdmin(){
    $auth_user = get_auth_user();
    if($auth_user == null ||  $auth_user->job != 'admin' ){
        return false;
    }else{
        return true;

    }
}

function authUser(){
    if(isset($_SESSION['email'])){
        return true;
    }else{
        return false;
    }
}