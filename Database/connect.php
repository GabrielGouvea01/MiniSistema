<?php
$host = "192.168.10.22";
$dbname = "escola";
$user = "escola";
$pass = "escola";
try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",$user,$pass
    );
    echo "Conexão com Postgres realizada<br>";
}catch (PDOException $e){
    echo "Erro: ". $e->getMenssage();
}
?>