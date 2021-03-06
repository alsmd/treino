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
        foto text,
        slug varchar(200),
        tipo enum('dublado','legendado') default 'legendado'
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
        ALTER TABLE anime_categoria ADD CONSTRAINT fk_anime_categoria FOREIGN KEY(fk_id_anime) REFERENCES anime(id) ON DELETE CASCADE;
        ALTER TABLE anime_categoria ADD CONSTRAINT fk_categoria_anime FOREIGN KEY(fk_id_categoria) REFERENCES categoria(id) ON DELETE CASCADE;
";
$table_episodio = "
        DROP TABLE IF EXISTS episodio;
        CREATE TABLE IF NOT EXISTS episodio(
            id int primary key auto_increment,
            fk_id_anime int,
            titulo varchar(200),
            link varchar(200),
            episodio int
        );
        ALTER TABLE episodio ADD CONSTRAINT fk_anime_episodio FOREIGN KEY(fk_id_anime) REFERENCES anime(id) ON DELETE CASCADE;
";
$table_users = "
        DROP TABLE IF EXISTS users;
        CREATE TABLE IF NOT EXISTS users(
            id int primary key auto_increment,
            nome varchar(200) null,
            email varchar(200) not null unique,
            password varchar(32) not null,
            job enum('user','admin') default 'user'
        );
";
/*
    Dropando todas tabelas
    @primeiro drope as tabelas filhass para deposi dropar as pais
*/
$drop = "
    DROP TABLE IF EXISTS anime_categoria;
    DROP TABLE IF EXISTS categoria;
    DROP TABLE IF EXISTS episodio;
    DROP TABLE IF EXISTS anime;
    DROP TABLE IF EXISTS users;
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
    $prepare = $db->prepare($table_episodio);
    $prepare->execute();
    echo $prepare->errorInfo()[1]. '--'.$prepare->errorInfo()[2];
    $prepare = $db->prepare($table_users);
    $prepare->execute();
    echo $prepare->errorInfo()[1]. '--'.$prepare->errorInfo()[2];
}catch(\PDOException $e){
    echo "<p style='color:orange;'>Houve um erro ao criar os bancos de dados <br></p>".$e->getMessage();
}

