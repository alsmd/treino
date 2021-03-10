<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use App\Models\Categoria;
use App\Models\Episodio;
use \App\Connection;

class AnimeController extends Action{
    protected $anime;
    public function __construct(Anime $anime){
        $this->anime = $anime;
        $this->view = new \stdClass;
    }


    public function index(){
        $this->view->dados = $this->anime->orderBy('nome','ASC')->get();
        $this->view->opcao = '/anime/';
        $this->view->titulo = "Animes";

        $this->render('model2','layout');
    }
    public function search(){
        $filter = isset($_POST['filter']) ? $_POST['filter']:$_GET['filter'];
        $animes = $this->anime;
        if(isset($_GET['tipo'])){
            $animes =$animes->where([
                ['tipo',$_GET['tipo']],
                ["nome","like","%$filter%"]
            ]);
        }else{
            $animes = $animes->where("nome","like","%$filter%")->orWhere("nome_alternativo","LIKE","%$filter%");
        }

        $perPage = 8;
        $pagAtual= isset($_GET['page'])? $_GET['page'] : 1;
        $pular=($pagAtual - 1) * $perPage;
        $this->view->filter = $filter;
        $this->view->animes = $animes->limit($perPage)->offset($pular)->get();
        $this->render('model1','layout');
    }
    public function show($slug){
        $episodio = new Episodio();
        $slug = $slug[2];
        $anime_class = new Anime();
        $this->view->anime = $anime_class->where('slug',$slug)->first();
        $this->view->categorias = $this->view->anime->categorias()->get();
        $this->view->episodios =$this->view->anime->episodios()->get();

        $this->render('anime.show','layout');
    }

    /*Cruds*/
    public function gerenciar(){
        $anime_class = new Anime();
        $categorias = new Categoria();
        $this->view->animes = $anime_class->get();
        $this->view->categorias = $categorias->get();
        $this->view->adminPageAtual = 'anime.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $episodio = new Episodio();
        $anime_class = new Anime();
        $categorias = new Categoria();
        $this->view->animes = $anime_class->get();
        $this->view->anime = $anime_class->find($_POST['id']);
        $this->view->categorias = $categorias->get();
        /*recuperando categorias usadas */
        $categorias_usadas = $this->view->anime->categorias()->select('fk_id_categoria')->get();
        $this->view->categorias_usadas = [];
        foreach($categorias_usadas as $categoria){
            $this->view->categorias_usadas[] = $categoria['fk_id_categoria'];
        }
        /*episodios*/
        $this->view->episodios = $this->view->anime->episodios()->get();
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
        $anime = new Anime();
        //criando anime e sincronizando com categorias
        try{
            $anime = $anime->create($dados);
            $anime->categorias()->sync($categorias);
            $retorno = true;
        }catch(\PDOException $e){
            $retorno = false;
            echo "Houve um erro ao salvar arquivo". $e->getMessage();
        }
        //caso o anime tenha sido criado com sucesso iremos passar uma mensagem
        if($retorno){
            $mensagem = "Anime criado com sucesso";
            $mensagem_type = 'success';
        }else{
            $mensagem = "Houve um erro ao criar anime";
            $mensagem_type = 'error';
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/anime/gerenciar");

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
        $anime = Anime::find($id);
        //salvando foto caso a mesma tenha sido trocada
        if($_FILES['foto']['name'] != ''){
            $foto_name = $anime['foto'];
            if(file_exists($foto_name))
                unlink($foto_name);
            $extensao = str_replace('image/','.',$_FILES['foto']['type']);
            $name = str_replace(' ','-',$dados['nome']);
            $destino = 'fotos/'.$name.$extensao;
            $tmp_name = $_FILES['foto']['tmp_name'];
            if(move_uploaded_file($tmp_name,$destino)){
                $dados['foto'] = $destino;
            }else{
                $dados['foto'] = "fotos/padrao.png";
            }
        }else{
            unset($dados['foto']);
        }
        try{
            $anime->update($dados);
            $anime->categorias()->sync($categorias);
            $retorno = true;
        }catch(\PDOException $e){
            echo "Houve um erro ao atualizar aquivo <br>". $e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Anime Atualizado com sucesso";
            $mensagem_type = "success";
        }else{
            $mensagem = "Erro Ao Atualizar Anime";
            $mensagem_type = "error";
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/anime/gerenciar");
    }
    public function delete(){
        $id = $_POST['id'];
        $anime = Anime::find($id);
        try{
            $anime->categorias()->sync([]);
            $anime->delete();
            $retorno = true;
        }catch(\PDOException $e){
            echo 'Houve um problemaa ao tentar deletar arquivo <br>'.$e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Anime Apagada Com Sucesso!";
            $mensagem_type = 'success';
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Anime!";
            $mensagem_type = 'error';
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/anime/gerenciar?");
    }

    public function saveEpisodio(){
        $dados = $_POST;
        $anime_id = $_POST['fk_id_anime'];
        unset($dados['id']);
        $anime = Anime::find($anime_id);
        try{
            $anime->episodios()->create($dados);
            $retorno = true;
        }catch(\PDOException $e){
            echo "Houve um erro ao salvar episodio <br>".$e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Episodio Adicionado com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Adicionar Episodio!";
        }
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }


    public function deleteEpisodio(){
        $anime = Anime::find($_POST['fk_id_anime']);
        $episodio = Episodio::where('episodio',$_POST['episodio'])->first();

        try{
            $episodio->delete();
            $retorno = true;
        }catch(\PDOException $e){
            echo "Houve um erro ao deletar registro <br>". $e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Episodio Apagado com Sucesso!";
            $mensagem_type = "success";
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Episodio!";
            $mensagem_type = "error";
        }
         $_SESSION['mensagem'] = $mensagem;
         $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/anime/gerenciar?mensagem=$mensagem");
    }

    public function showEpisodio($parametros){
        $anime = $parametros[2];
        $episodio = $parametros[3];
        $this->view->anime = Anime::where('slug',$anime)->first();
        $this->view->episodio = $this->view->anime->episodios()->where('episodio',$episodio)->first();
        $this->render('anime.episodio.show','layout');
    }
}