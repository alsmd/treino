<?php

namespace App;

class Connection{
    static public function getDb(){
        try{
            $con = new \PDO('mysql:host=localhost;dbname=animekisa','root','');
            return $con;
        }catch(\PDOException $e){
            echo 'Um erro inesperado ocorreu ao tentar realizar a conexão<br>'.$e->getMessage();
        }
    }
}