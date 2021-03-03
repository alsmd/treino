<?php

namespace App\Models;
use MF\Model\Container;
class Episodio extends Container{
    private $id;
    protected $table = "episodio";
    protected $foto;
    protected $query;
    protected $columns = "(titulo,episodio,link,fk_id_anime)";
    protected $columns_v = "(:titulo,:episodio,:link,:fk_id_anime)";

    /*Setters and Getters*/
    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}