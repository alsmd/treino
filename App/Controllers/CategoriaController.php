<?php
namespace App\Controllers;
use MF\Controller\Action;
use \App\Connection;
use App\Models\Categoria;

class CategoriaController extends Action{
    protected $categoria;


    public function index(){
        $categoria = Categoria::get();
        $this->view->dados = $categoria;
        $this->view->opcao = '/categoria/';
        $this->view->titulo = "Categorias";

        $this->render('model2','layout');
    }
    public function show($genero){
        $slug = $genero[2];
        $categoria = Categoria::where('slug',$slug)->first();
        $perPage = 8;
        $pagAtual= isset($_GET['page'])? $_GET['page'] : 1;
        $pular=($pagAtual - 1) * $perPage;
        if(isset($_GET['tipo'])){
            $this->view->animes = $categoria->animes()->where('tipo',$_GET['tipo'])->limit($perPage)->offset($pular)->get();
        }else{
            $this->view->animes = $categoria->animes()->limit($perPage)->offset($pular)->get();
        }
        $this->render('model1','layout');
    }

    /*CRUDS*/

    public function gerenciar(){
        $this->view->categorias =Categoria::get();
        $this->view->adminPageAtual = 'categoria.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $id = $_POST['id'];
        $categoria = new Categoria;
        $this->view->categorias =$categoria->get();
        $this->view->adminPageAtual = 'categoria.edite';
        $this->view->categoria = $categoria->find($id);
        $this->render('admin','layout');
    }

    public function save(){
        $dados = $_POST;
        $dados = $this->retirarEspacos($dados);
        $categoria = new Categoria;
        try{
            $categoria->create($_POST);
            $retorno = true;
        }catch(\PDOException $e){
            echo "Houve um erro ao salvar arquivo <br>". $e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Categoria criada com sucesso";
            $mensagem_type = "success";
        }else{
            $mensagem = "Houve um erro ao criar categoria";
            $mensagem_type = "error";
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }
    public function update(){
        $id = $_POST['id'];
        $dados = $_POST;
        $dados = $this->retirarEspacos($dados);
        unset($dados['id']);
        $categoria = Categoria::find($id);
        try{
            $categoria->update($dados);
            $retorno = true;
        }catch(\PDOException $e){
            echo "Houve um erro ao atualizar registro <br>".$e->getMessage();
            $retorno = false;
        }
        if($retorno){
            $mensagem = "Categoria Atualizada Com Sucesso!";
            $mensagem_type = "success";
        }else{
            $mensagem = "Houve Um Erro Ao Atualizar Categoria!";
            $mensagem_type = "error";
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }
    public function delete(){
        $id = $_POST['id'];
        $categoria =Categoria::find($id);
        $retorno = $categoria->delete();
        if($retorno){
            $mensagem = "Categoria Apagada Com Sucesso!";
            $mensagem_type = "success";
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Categoria!";
            $mensagem_type = "error";
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem_type'] = $mensagem_type;
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }   
}