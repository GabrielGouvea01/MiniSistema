<?php 
require_once  __DIR__ .'/../includes/functions.php';
require_once  __DIR__ .'/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Cadastre-se</h1>
        <form action="" method="POST">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email"><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha"><br>
            <input type="submit" value="cadastrar">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            cadastrar_user($conexao, $_POST['email'], $_POST['senha']);
        }
        ?>
    </main>
</body>
</html>
