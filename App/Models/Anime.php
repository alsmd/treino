<?php

namespace App\Models;
use MF\Model\Container;
class Anime extends Container{
    private $id;
    protected $table = "anime";
    protected $nome;
    protected $nome_alternativo;
    protected $slug;
    protected $descricao;
    protected $foto;
    protected $query;
    protected $columns = "(nome,slug,nome_alternativo,foto,descricao,status)";
    protected $columns_v = "(:nome,:slug,:nome_alternativo,:foto,:descricao,:status)";

    /*Setters and Getters*/
    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function filter($filter){
        $filter = "%".$filter."%";
        $query = "
            SELECT
                anime.*
            FROM
                anime
            WHERE
                anime.nome LIKE :filter OR nome_alternativo LIKE :filter
        ";
        $animes = $this->query($query)->runQuery(['filter'=>$filter]);
        foreach($animes as $indice => $anime){
            $query = "SELECT categoria.nome FROM anime_categoria RIGHT JOIN categoria on (anime_categoria.fk_id_categoria = categoria.id) WHERE fk_id_anime = :id";
            $categorias = $this->query($query)->runQuery(['id'=>$anime['id']]);
            $animes[$indice]['categorias']=$categorias;
        }
        return $animes;
    }

}