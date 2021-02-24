<?php
namespace App\Controllers;
use MF\Controller\Action;
use \App\Connection;
use App\Models\Categoria;

class CategoriaController extends Action{
    protected $categoria;


    public function index(){
        $categoria = new Categoria(Connection::getDb());
        $this->view->categorias = $categoria->read();
        $this->render('model2','layout');
    }
    public function genero(Array $genero){

    }

    public function show($genero){
        $categoria = new Categoria(Connection::getDb());
        $qnt_per_page = 8;
        $slug = $genero[2];
        $id_categoria = $categoria->read("WHERE slug = :slug",compact('slug'))[0]['id'];
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
        $animes = $categoria->query($query)->runQuery(['id_categoria'=>$id_categoria]);
        foreach($animes as $indice => $anime){
            $query = "
                Select
                    categoria.nome
                FROM
                    anime_categoria RIGHT JOIN categoria on(categoria.id = anime_categoria.fk_id_categoria)
                WHERE 
                    anime_categoria.fk_id_anime = :id_anime
            ";
            $animes[$indice]['categorias'] = $categoria->query($query)->runQuery(['id_anime'=>$anime['id']]);
        }
        $this->view->animes = $animes;
        $this->render('model1','layout');
    }



}