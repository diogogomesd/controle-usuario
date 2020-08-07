<?php
    //iniciando sessão
    session_start();

    //conexao ao BD
    require 'con.php';

    //pega o id na url
    $id = 0;
    if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);
    }

    //verifica se os dados estão preenchidos
    if(isset($_POST['nome']) && empty($_POST['nome']) ==false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        //faz alteração no BD
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
        $pdo->query($sql);
        header("Location: index.php");
    }    

        //busca no banco o usuario pra edição
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $sql = $pdo->query($sql);

        //verifica se achou algum usuario
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
        }
        else{
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
        <input type="text" name="nome" value="<?php echo $dado['nome'];?>"></br>
        E-mail:</br>
        <input type="email" name="email" value="<?php echo $dado['email'];?>"></br>
        Senha:</br>
        <input type="password" name="senha" value="<?php echo $dado['senha'];?>"></br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>