<?php

namespace App\Models;
use MF\Model\Container;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Episodio extends Eloquent{
    protected $table = "episodio";
    protected $fillable = ["episodio","link","titulo"];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    /*relacionamentos*/
    public function anime(){
        return $this->belongsTo(Anime::class,'fk_id_anime');
    } 
}