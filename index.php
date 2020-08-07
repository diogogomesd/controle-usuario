<?php

//iniciando sessão
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){

    //associa o arquivo de conexao ao bd.
    require 'con.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuários</title>
</head>
<body>
    <a href="Add.php ">Adicionar novo Usuário</a>
        <table border="0" width="100%">
            <tr>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
            </tr> 
    <?php  

   

    //seleciona dados no banco e usuarios nome da tabela
    $sql = "SELECT *FROM usuarios";
    $sql = $pdo->query($sql);

    //condição que conta as linhas da tabela
    if($sql->rowCount() > 0){
        //condição que armazenas as linhas da tabela encontrada na variavel usuario
        foreach($sql->fetchAll() as $usuario){
            echo '<tr>';
            echo '<td>'.$usuario['nome'].'</td>';
            echo '<td>'.$usuario['email'].'</td>';
            echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> - <a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
            
        }
    }
}
else{
    //redireciona para pg de login caso não esteja logado
    header("Location: login.html");
}
?>       
       
    </table>
</body>
</html>