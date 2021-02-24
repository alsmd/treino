<?php
namespace App\Controllers;
use MF\Controller\Action;
use App\Models\Anime;
use \App\Connection;

class AdminController extends Action{
    public function index(){
        $this->render('admin','layout');
    }



}