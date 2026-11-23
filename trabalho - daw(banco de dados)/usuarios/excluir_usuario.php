<?php
require "../conexao.php";

$nome = $_GET['nome'] ?? '';

if ($nome != "") {
    $sql = "DELETE FROM usuarios WHERE nome = '$nome'";
    mysqli_query($conexao, $sql);
}

header("location: lista_usuarios.php");
?>