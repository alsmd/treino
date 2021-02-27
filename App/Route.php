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
        $routes['anime-show'] = [
            'path' => '/anime/{}',
            'controller'=> 'AnimeController',
            'action' => 'show'
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
        $this->setRoutes($routes);
    }

}