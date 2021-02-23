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
        $routes['categoria'] = [
            'path' => '/categoria',
            'controller'=> 'CategoriaController',
            'action' => 'index'
        ];
        $routes['anime-genero'] = [
            'path' => '/anime/{}',
            'controller'=> 'AnimeController',
            'action' => 'genero'
        ];
        $this->setRoutes($routes);
    }

}