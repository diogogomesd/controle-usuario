<?php
//iniciando sessão
session_start();
 //pegando conexao ao bd
 require 'con.php';

//verificando se os campos recebidos estão preenchidos
if(isset($_POST['nome']) && empty($_POST['nome']) ==false ){
    $nome = addslashes($_POST['nome']);//proteção
    $email = addslashes($_POST['email']);//proteção
    $senha = md5(addslashes($_POST['senha']));//proteção e encriptando a senha

   
    //buscando usuario no bd
    $sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
    //procura se o usuario existe
    if($sql->rowCount() >0){
        $dado = $sql->fetch();
        //salvando usuario na sessao
        $_SESSION['id'] = $dado['id'];
        //redireciona usuario para pg inicial
        header("Location: index.php");
    }


}


?>