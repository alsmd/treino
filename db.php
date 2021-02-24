<?php
require_once 'App/Connection.php';
use App\Connection;
$db = Connection::getDb();
/*
    -TABLES
*/
$table_anime = "
    DROP TABLE IF EXISTS anime;
    CREATE TABLE IF NOT EXISTS anime(
        id int primary key auto_increment,
        nome varchar(200) not null,
        nome_alternativo varchar(200) not null,
        status enum('finalizado','andamento','cancelado'),
        descricao text,
        foto text
    );
";


$table_categoria = "
    DROP TABLE IF EXISTS categoria;
    CREATE TABLE IF NOT EXISTS categoria(
        id int primary key auto_increment,
        nome varchar(150) not null,
        slug varchar(200)
    );



";
$table_anime_categoria = "
        DROP TABLE IF EXISTS anime_categoria;
        CREATE TABLE IF NOT EXISTS anime_categoria(
            id int primary key auto_increment,
            fk_id_anime int,
            fk_id_categoria int
        );
        ALTER TABLE anime_categoria ADD CONSTRAINT fk_anime_categoria FOREIGN KEY(fk_id_anime) REFERENCES anime(id);
        ALTER TABLE anime_categoria ADD CONSTRAINT fk_categoria_anime FOREIGN KEY(fk_id_categoria) REFERENCES categoria(id);
";
/*
    Dropando todas tabelas
    @primeiro drope as tabelas filhass para deposi dropar as pais
*/
$drop = "
    DROP TABLE IF EXISTS anime_categoria;
    DROP TABLE IF EXISTS categoria;
    DROP TABLE IF EXISTS anime;
";
try{
    $prepare = $db->prepare($drop);
    $prepare->execute();
    echo $prepare->errorInfo()[2];
}catch(\PDOException $e){
    echo '<a style="color:orange;">Erro ao dropar Tabelas<a>'.$e->getMessage();
}
/*
Executando as Querys
*/
try{
    $prepare = $db->prepare($table_anime);
    $prepare->execute();
    echo $prepare->errorInfo()[1]. '--'.$prepare->errorInfo()[2];
    $prepare = $db->prepare($table_categoria);
    $prepare->execute();
    echo $prepare->errorInfo()[1]. '--'.$prepare->errorInfo()[2];
    $prepare = $db->prepare($table_anime_categoria);
    $prepare->execute();
    echo $prepare->errorInfo()[1]. '--'.$prepare->errorInfo()[2];
}catch(\PDOException $e){
    echo "<p style='color:orange;'>Houve um erro ao criar os bancos de dados <br></p>".$e->getMessage();
}

