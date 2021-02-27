<?php
namespace App\Controllers;
use MF\Controller\Action;
use \App\Connection;
use App\Models\Categoria;

class CategoriaController extends Action{
    protected $categoria;


    public function index(){
        $categoria = new Categoria(Connection::getDb());
        $this->view->dados = $categoria->read();
        $this->view->opcao = '/categoria/';
        $this->view->titulo = "Categorias";

        $this->render('model2','layout');
    }
    public function show($genero){
        $categoria = new Categoria(Connection::getDb());
        $slug = $genero[2];
        $categoria->__set('slug',$slug);
        $animes = $categoria->getAnimeByCat();
        $this->view->animes = $animes;
        $this->render('model1','layout');
    }

    /*CRUDS*/

    public function gerenciar(){
        $categoria = new Categoria(Connection::getDb());
        $this->view->categorias =$categoria->read();
        $this->view->adminPageAtual = 'categoria.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $categoria = new Categoria(Connection::getDb());
        $this->view->categorias =$categoria->read();
        $this->view->adminPageAtual = 'categoria.edite';
        $this->view->categoria = $categoria->read('where id = :id',['id'=>$_POST['id']]);
        $this->render('admin','layout');
    }

    public function save(){
        $dados = $_POST;
        $requer = [
            "nome" => 3,
            "slug" => 3
        ];
        $dados = $this->retirarEspacos($dados);
        $redirecionamento = "/admin/categoria/gerenciar";
        //verifica se os dados estão com a formatação correta, caso não esteja sera redirecionado
        $this->verificarDados($dados,$requer,$redirecionamento);
        $categoria = new Categoria(Connection::getDb());
        $retorno = $categoria->create($_POST);
        if($retorno){
            $mensagem = "Categoria criada com sucesso";
        }else{
            $mensagem = "Houve um erro ao criar categoria";
        }
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }
    public function update(){
        $id = $_POST['id'];
        $dados = $_POST;
        $dados = $this->retirarEspacos($dados);
        unset($dados['id']);
        $categoria = new Categoria(Connection::getDb());
        $retorno = $categoria->update($dados,$id);
        if($retorno){
            $mensagem = "Categoria Atualizada Com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Atualizar Categoria!";
        }
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }
    public function delete(){
        $id = $_POST['id'];
        $categoria = new Categoria(Connection::getDb());
        $retorno = $categoria->delete($id);
        if($retorno){
            $mensagem = "Categoria Apagada Com Sucesso!";
        }else{
            $mensagem = "Houve Um Erro Ao Apagar Categoria!";
        }
        header("Location:/admin/categoria/gerenciar?mensagem=$mensagem");
    }   


}