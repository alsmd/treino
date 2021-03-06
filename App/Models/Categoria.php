<?php

namespace App\Models;
use MF\Model\Container;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Categoria extends Eloquent{
    protected $table = "categoria";
    protected $fillable = ["nome","slug"];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    /*relacionamentos*/
    public function animes(){
        return $this->belongsToMany(Anime::class,'anime_categoria','fk_id_categoria','fk_id_anime');
    }
}