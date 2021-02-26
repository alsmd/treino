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
        $this->view->adminPageAtual = 'categoria.gerenciar';
        $this->render('admin','layout');
    }

    public function edite(){
        $this->view->adminPageAtual = 'categoria.edite';
        $this->render('admin','layout');
    }

    public function save(){
        print_r($_POST);
    }
    public function update(){

    }
    public function delete(){

    }


}