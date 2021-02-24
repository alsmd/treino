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
        $routes['admin'] = [
            'path' => '/admin',
            'controller'=> 'AdminController',
            'action' => 'index'
        ];
        $this->setRoutes($routes);
    }

}