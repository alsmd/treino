<?php

namespace App\Models;
use MF\Model\Container;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Episodio extends Eloquent{
    protected $table = "episodio";
    protected $fillable = ["episodio","link","titulo"];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    /*Setters and Getters*/
    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    /*relacionamentos*/
    public function anime(){
        return $this->belongsTo(Anime::class,'fk_id_anime');
    } 
}