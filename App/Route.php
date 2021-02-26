<?php

namespace App;
use MF\Init\Bootstrap;
class Route extends Bootstrap{

    //@set seta rotas disponiveis
    protected function initRoutes(){
        $routes['home'] = [
            'path' => '/',
            'controller'=> 'IndexController',
            'action' => 'index'
        ];
        $routes['login'] = [
            'path' => '/login',
            'controller'=> 'LoginController',
            'action' => 'index'
        ];
        $routes['categorias'] = [
            'path' => '/categoria',
            'controller'=> 'CategoriaController',
            'action' => 'index'
        ];
        $routes['categoria'] = [
            'path' => '/categoria/{}',
            'controller'=> 'CategoriaController',
            'action' => 'show'
        ];
        $routes['anime'] = [
            'path' => '/anime',
            'controller'=> 'AnimeController',
            'action' => 'index'
        ];
        $routes['anime-genero'] = [
            'path' => '/anime/{}',
            'controller'=> 'AnimeController',
            'action' => 'genero'
        ];
        $routes['pesquisar'] = [
            'path' => '/pesquisar',
            'controller'=> 'AnimeController',
            'action' => 'search'
        ];
        /*Area Administrativa*/
        $routes['admin'] = [
            'path' => '/admin',
            'controller'=> 'AdminController',
            'action' => 'index'
        ];
        $routes['admin-controller'] = [
            'path' => '/admin/{}/{}',
            'controller'=> 'AdminController',
            'action' => 'controlarAcao'
        ];
        /* $routes['categoria-create'] = [
            'path' => '/admin/categoria/create',
            'controller'=> 'CategoriaController',
            'action' => 'create'
        ];
        $routes['categoria-edite'] = [
            'path' => '/admin/categoria/edite',
            'controller'=> 'CategoriaController',
            'action' => 'edite'
        ];
        $routes['categoria-remove'] = [
            'path' => '/admin/categoria/remove',
            'controller'=> 'CategoriaController',
            'action' => 'remove'
        ];
        $routes['categoria-save'] = [
            'path' => '/admin/categoria/save',
            'controller'=> 'CategoriaController',
            'action' => 'save'
        ];
        $routes['categoria-update'] = [
            'path' => '/admin/categoria/update',
            'controller'=> 'CategoriaController',
            'action' => 'update'
        ];
        $routes['categoria-delete'] = [
            'path' => '/admin/categoria/delete',
            'controller'=> 'CategoriaController',
            'action' => 'delete'
        ]; */
        $this->setRoutes($routes);
    }

}