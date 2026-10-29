<?php 
require_once  __DIR__ .'/../includes/functions.php';
require_once  __DIR__ .'/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body>
    <?php include  __DIR__ .'/../includes/header.php'?>
    <form action="" method="POST"></form>
        <label for="id">ID: </label>
        <input type="number" name="id" id="id">

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>

        <label for="turma">Turma: </label>
        <input type="text" name="turma" id="turma"><br>

        <label for="nasc">Nascimento: </label>
        <input type="date" name="nasc" id="nasc"><br>

        <label for="ativo">Ativo?: </label>
        <input type="radio" name="ativo" id="ativo" value="true">

        <label for="sim">SIM</label>
        <input type="radio" name="ativo" id="ativo" value="false">

        <label for="nao">NÃO</label>
        <input type="reset" value="Limpar">
        
        <input type="submit" value="Atualizar">
    </form>
    <?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        atualizar($conexao, $_POST['id'],$_POST['nome'],$_POST['turma'],$_POST['nasc'],$_POST['ativo']);
    }
        include  __DIR__ .'/../includes/footer.php';
    ?>
</body>
</html>
