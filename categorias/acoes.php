<?php
session_start();
//CONEXÃO COM O BANCO E DADOS
require('../database/conexao.php');

//FUNÇÃO VALIDAÇÃO

function validaCampos(){
    $erros = [];

    if(!isset($_POST['descricao']) || $_POST['descricao'] == ""){
        $erros[] = "O campo descrição é de preenchimento obrigatório!";
    }

    return $erros;
}
//TRATAMENTO DOS DADOS
//tipo da ação
//execução dos processos da ação solicitada


switch ($_POST['acao']) {
    case 'inserir':
        $erros = validaCampos();

        if(count($erros) > 0){
            $_SESSION["erros"] = $erros;
            header('location: index.php');
            exit();
        }


        // echo 'inserir';exit;
        $descricao = $_POST['descricao'];

        //montagem da intrção sql de inserção de dados
        $sql = "INSERT INTO tbl_categoria (descricao) 
        VALUES ('$descricao')";
        // echo $sql;exit;
        
        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');
        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';
        
        // exit;
        break;

        case 'deletar':
            $categoriaID = $_POST['categoriaId'];

            $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaID";

            $resultado = mysqli_query($conexao, $sql);

            header('location: index.php');
            break;

            case 'editar';
            $id = $_POST["id"];
            $descricao = $_POST["descricao"];

            $sql = "UPDATE tbl_categoria SET descricao = '$descricao' WHERE id = $id";
            // echo $sql;exit;

            $resultado = mysqli_query($conexao, $sql);

            header('location: index.php');
            break;
    default:
        # code...
        break;
}
