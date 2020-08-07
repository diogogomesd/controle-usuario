<?php
    //busca conexao ao banco
    require 'con.php';
    //verifica se tem o campo nome na url e não está vazia
    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);//prevenção de url maliciosa
        $email = addslashes($_POST['email']);//prevenção
        $senha = md5(addslashes($_POST['senha'])); //prevenção e encripta em 32 bits

        //insere no banco as informções vindas da tabela html
        $sql = "INSERT INTO usuarios SET nome='$nome', email='$email', senha='$senha'";
        $pdo->query($sql);

        //retorna para pagina index do sistema
        header("Location: index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <form method="POST">
        Nome:</br>
        <input type="text" name="nome"></br>
        E-mail:</br>
        <input type="email" name="email"></br>
        Senha:</br>
        <input type="password" name="senha"></br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>