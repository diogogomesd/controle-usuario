<?php
    //especificação de onde esta o banco de dados
    $con = "mysql:dbname=blog;host=localhost";//tipo nome e local do banco
    $dbuser = "";//usuário do banco de dados dentro das aspas
    $dbpass = "";// senha do banco de dados dentro das aspas

    //função que é chamada para conectar ao banco de dados
    try{
        $pdo = new PDO($con, $dbuser, $dbpass);

    }
    //função chamada quando a conexão não é efetuada
    catch(PDOExeception $e){
        echo "ERRO: ".$e->getMessage();
    }
?>