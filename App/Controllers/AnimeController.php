<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use App\Models\Categoria;
use App\Models\Episodio;
use \App\Connection;

class AnimeController extends Action{
    public function index(){
        $anime = new Anime(Connection::getDb());
        $this->view->dados = $anime->read('order by nome asc');
        $this->view->opcao = '/anime/';
        $this->view->titulo = "Animes";

        $this->render('model2','layout');
    }
    public function search(){
        $anime_class = new Anime(Connection::getDB());
        $animes = $anime_class->filter($_POST['filter']);
        $this->view->animes = $animes;
        $this->render('model1','layout');
    }
    public function show($slug){
        $episodio = new Episodio(Connection::getDb());
        $slug = $slug[2];
        $anime_class = new Anime(Connection::getDB());
        $this->view->anime = $anime_class->read('where slug = :slug',compact('slug'))[0];
        $this->view->categorias = $anime_class->getCatsByAnime($this->view->anime['id']);
        $this->view->episodios = $episodio->read('WHERE fk_id_anime = :fk_id_anime ORDER BY episodio DESC',['fk_id_anime'=>$this->view->anime['id']]);

        $this->render('anime.show','layout');
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
        $episodio = new Episodio(Connection::getDb());
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
        /*episodios*/
        $this->view->episodios = $episodio->read('WHERE fk_id_anime = :fk_id_anime',['fk_id_anime'=>$this->view->anime['id']]);
        /*paginação atual do admin*/
        $this->view->adminPageAtual = 'anime.edite';
        $this->render('admin','layout');
    }
    public function save(){
        $dados = $this->retirarEspacos($_POST);
        //salvando foto
        $extensao = str_replace('image/','.',$_FILES['foto']['type']);
        $name = str_replace(' ','-',$dados['nome']);
        $destino = 'fotos/'.$name.$extensao;
        $tmp_name = $_FILES['foto']['tmp_name'];
        if(move_uploaded_file($tmp_name,$destino)){
            $dados['foto'] = $destino;
        }else{
            $dados['foto'] = 'fotos/padrao.png';
        }
        $categorias = $_POST['categorias'];
        unset($dados['categorias']);
        $requer = [
            "nome" => 3,
            "slug" => 3,
            "nome_alternativo" =>3,
            "descricao" => 10,
            "foto" =>3
        ];
        //verifica se os dados estão com a formatação correta, caso não esteja sera redirecionado
        $redirecionamento = "/admin/anime/gerenciar";
        //$this->verificarDados($dados,$requer,$redirecionamento);
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
        $dados = $this->retirarEspacos($_POST);
        $img = false;
        if(isset($_POST['categorias'])){
            $categorias = $_POST['categorias'];
            unset($dados['categorias']);
        }else{
            $categorias = [];
        }
        $id = $dados['id'];
        unset($dados['id']);
        $anime = new Anime(Connection::getDb());
        //salvando foto
        if($_FILES['foto']['name'] != ''){
            $foto_name = $anime->query('select foto from anime where id = :id')->runQuery(['id'=>$id])[0]['foto'];
            if(file_exists($foto_name))
                unlink($foto_name);
            $extensao = str_replace('image/','.',$_FILES['foto']['type']);
            $name = str_replace(' ','-',$dados['nome']);
            $destino = 'fotos/'.$name.$extensao;
            $tmp_name = $_FILES['foto']['tmp_name'];
            if(move_uploaded_file($tmp_name,$destino)){
                $dados['foto'] = $destino;
                $img = true;
                $mensagem = 'Anime Atualizado com sucesso';
            }
        }else{
            unset($dados['foto']);
        }
        $retorno = $anime->update($dados,$id);
        /*Apaga a relaão com categoria e cria uma nova */
        $anime->query("DELETE FROM anime_categoria WHERE fk_id_anime = :anime_id")->runQuery(['anime_id'=>$id],2);
        $sucesso = 0;
        foreach($categorias as $categoria){
            $sucesso += $anime->query("INSERT INTO anime_categoria(fk_id_categoria,fk_id_anime)VALUES(:id_categoria,:id_anime)")->runQuery(['id_categoria'=>$categoria,'id_anime'=>$id],2);
        }
        if($retorno){
            $mensagem = "Anime Atualizado com sucesso";
        }
        //verifica se houve um erro ao atualizar anime, caso a tentativa de atualizar todos os componentes for 0(false) a mensagem sera de erro
        if($retorno == 0 ){
            if($sucesso ==0 && $img ==false)
                $mensagem = "Houve um erro ao atualizar anime";
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

    public function saveEpisodio(){
        $episodio = new Episodio(Connection::getDB());
        $retorno = $episodio->create($_POST);
        if($retorno){
            $mensagem = "Episodio Adicionado com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Adicionar Episodio!";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }


    public function deleteEpisodio(){
        $episodio = new Episodio(Connection::getDB());
        $retorno = $episodio->query("DELETE FROM episodio WHERE episodio = :episodio AND fk_id_anime = :fk_id_anime")->runQuery(['fk_id_anime'=>$_POST['fk_id_anime'], 'episodio' => $_POST['episodio']],2);
        if($retorno){
            $mensagem = "Episodio Apagado com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Episodio!";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }

    public function showEpisodio($parametros){
        $anime = $parametros[2];
        $episodio = $parametros[3];
        $this->view->anime = (new Anime(Connection::getDb()))->read('where slug = :slug',['slug'=> $anime])[0];
        $this->view->episodio = (new Episodio(Connection::getDB()))->read('where episodio = :episodio AND fk_id_anime = :fk_id_anime',['episodio'=>$episodio,'fk_id_anime'=>$this->view->anime['id']])[0];
        $this->render('anime.episodio.show','layout');
    }
}