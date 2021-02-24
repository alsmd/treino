<?php

namespace App\Models;
use MF\Model\Container;
class Categoria extends Container{
    private $id;
    protected $table = "categoria";
    protected $nome;
    protected $slug;
    protected $query;
    protected $columns = "(nome,slug)";
    protected $columns_v = "(:nome,:slug)";

    /*Setters and Getters*/
    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

}