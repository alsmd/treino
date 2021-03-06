<?php
include '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Anime;
$capsule = new Capsule;

$capsule->addConnection([
    "driver"=> "mysql",
    "host"=>"127.0.0.1",
    "database" => "animekisa",
    "username"=>"root",
    "password"=>""
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
$capsule->bootEloquent();
//inicia aplicação
$route = new App\Route;