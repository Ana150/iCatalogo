<?php 

//PARAMETROS DE CONEXÃO MYSQLI
//host: onde o banco de dados roda
//user: o usuarios do banco
//password: senha do usuario do banco 
//database: nome do banco

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'icatalogo';

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if($conexao === false){
    die(mysqli_connect_error());
}

// echo '<pre>';
// var_dump($conexao);
// echo '</pre>';