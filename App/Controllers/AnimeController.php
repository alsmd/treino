<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use App\Models\Categoria;
use \App\Connection;

class AnimeController extends Action{
    public function index(){
    }
    public function search(){
        $anime_class = new Anime(Connection::getDB());
        $animes = $anime_class->filter($_POST['filter']);
        $this->view->animes = $animes;
        $this->render('model1','layout');
    }

    /*Cruds*/
    public function gerenciar(){
        $anime_class = new Anime(Connection::getDB());
        $categorias = new Categoria(Connection::getDB());
        $this->view->animes = $anime_class->read();
        $this->view->categorias = $categorias->read();
        $this->view->adminPageAtual = 'anime.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $anime_class = new Anime(Connection::getDB());
        $categorias = new Categoria(Connection::getDB());
        $this->view->animes = $anime_class->read();
        $this->view->anime = ($anime_class->read("where id = :id",['id'=>$_POST['id']]))[0];
        $this->view->categorias = $categorias->read();
        /*recuperando categorias usadas */
        $query = "SELECT fk_id_categoria FROM anime_categoria where fk_id_anime = :anime_id";
        $categorias_usadas = $categorias->query($query)->runQuery(["anime_id"=>$_POST['id']]);
        $this->view->categorias_usadas = array_map(function($categoria_usada){
            return $categoria_usada['fk_id_categoria'];
        },$categorias_usadas);
        /*paginação atual do admin*/
        $this->view->adminPageAtual = 'anime.edite';
        $this->render('admin','layout');
    }
    public function save(){
        $dados = $_POST;
        $categorias = $_POST['categorias'];
        unset($dados['categorias']);
        $requer = [
            "nome" => 3,
            "slug" => 3,
            "nome_alternativo" =>3,
            "descricao" => 10,
            "foto" =>5
        ];
        $redirecionamento = "/admin/anime/gerenciar";
        //verifica se os dados estão com a formatação correta, caso não esteja sera redirecionado
        $this->verificarDados($dados,$requer,$redirecionamento);
        $anime = new Anime(Connection::getDb());
        $retorno = $anime->create($dados);
        //caso o anime tenha sido criado com sucesso iremos tentar vincular com as categorias
        if($retorno){
            $id_anime_criado = ($anime->query("SELECT id FROM anime ORDER BY id DESC LIMIT 1")->runQuery())[0]['id'];
            $sucesso = 0;
            foreach($categorias as $categoria){
                $sucesso += $anime->query("INSERT INTO anime_categoria(fk_id_categoria,fk_id_anime)VALUES(:id_categoria,:id_anime)")->runQuery(['id_categoria'=>$categoria,'id_anime'=>$id_anime_criado],2);
            }
            if($sucesso){
                $mensagem = "Anime criado com sucesso";
            }else{
                $mensagem = "Anime criado com sucesso, mas houve um erro ao vincular categorias";
            }
        }else{
            $mensagem = "Houve um erro ao criar anime";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");

    }
    public function update(){
        $dados = $_POST;
        $categorias = $_POST['categorias'];
        $id = $_POST['id'];
        unset($dados['categorias']);
        unset($dados['id']);
        $anime = new Anime(Connection::getDb());
        $retorno = $anime->update($dados,$id);
        //verifica se o anime foi atualizado
        if($retorno > 0 ){
            $mensagem = "Anime Atualizado com sucesso";
        }else{
            $mensagem = "Houve um erro ao atualizar anime";
        }
        /*Apaga a relaão com categoria e cria uma nova */
        $anime->query("DELETE FROM anime_categoria WHERE fk_id_anime = :anime_id")->runQuery(['anime_id'=>$id],2);
        $sucesso = 0;
        foreach($categorias as $categoria){
            $sucesso += $anime->query("INSERT INTO anime_categoria(fk_id_categoria,fk_id_anime)VALUES(:id_categoria,:id_anime)")->runQuery(['id_categoria'=>$categoria,'id_anime'=>$id],2);
        }
        if($sucesso){
            $mensagem = "Anime Atualizado com sucesso";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }
    public function delete(){
        $id = $_POST['id'];
        $anime = new Anime(Connection::getDb());
        $anime->query("DELETE FROM anime_categoria WHERE fk_id_anime = :anime_id")->runQuery(['anime_id'=>$id]);
        $retorno = $anime->delete($id);
        if($retorno){
            $mensagem = "Anime Apagada Com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Anime!";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }


}