<?php

namespace App\Models;
use MF\Model\Container;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Anime extends Eloquent{
    protected $table = "anime";
    protected $fillable = ["nome","nome_alternativo","slug","status","descricao","foto","tipo"];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function __constuct(){
        
    }
    public function filter($filter){
        return $animes;
    }
    /*Relacionamentos*/
    public function episodios(){
        return $this->hasMany(Episodio::class,'fk_id_anime');
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class,'anime_categoria','fk_id_anime','fk_id_categoria');
    }
}