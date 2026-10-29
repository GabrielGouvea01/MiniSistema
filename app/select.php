<?php 
require_once __DIR__ .'/../includes/functions.php';
require_once __DIR__ .'/../login/verifica_user.php';
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
    <?php include __DIR__ .'/../includes/header.php';?>
    <div style="width: 30%; margin:auto; text-align:center; border:1px solid black; border-radius:5px;">
        <h3>Lista completa de alunos</h3>
    </div>
    <?php
    listar($conexao);
    include __DIR__ .'/../includes/footer.php';
    ?>
</body>
</html>