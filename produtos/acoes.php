<?php
require("../database/conexao.php");
switch ($_POST["acao"]) {
    case 'inserir':
        // tratamento da imagem para upload

        $nomeArquivo = $_FILES["foto"]["name"];
        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
        $novoNome = md5(microtime()) . "." . $extensao;

        // echo $nomeArquivo;
        // echo '<br>';
        // echo $novoNome;

        move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNome");
        break;
    
    default:
        # code...
        break;
}
?>