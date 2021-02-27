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
    /*
        return animes correspontes a categoria com base no slug setado no obj
    */
    public function getAnimeByCat(){
        $qnt_per_page = 8;
        $id_categoria = $this->read("WHERE slug = :slug",['slug'=>$this->slug]);
        if(count($id_categoria)){
            $id_categoria= $id_categoria[0]['id'];
        }else{
            echo 'Categoria Não existe';
            die();
        }
        $query = "
            SELECT
            anime.*
            FROM 
            anime_categoria
            RIGHT JOIN anime on(anime_categoria.fk_id_anime = anime.id)
            WHERE
            anime_categoria.fk_id_categoria = :id_categoria
            LIMIT
                $qnt_per_page
            ";
        $animes = $this->query($query)->runQuery(['id_categoria'=>$id_categoria]);
        foreach($animes as $indice => $anime){
            $query = "
                Select
                    categoria.nome
                FROM
                    anime_categoria RIGHT JOIN categoria on(categoria.id = anime_categoria.fk_id_categoria)
                WHERE 
                    anime_categoria.fk_id_anime = :id_anime
            ";
            $animes[$indice]['categorias'] = $this->query($query)->runQuery(['id_anime'=>$anime['id']]);
        }
        return $animes;
    }

}