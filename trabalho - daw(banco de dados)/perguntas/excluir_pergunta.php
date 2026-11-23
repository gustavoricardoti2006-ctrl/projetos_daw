<?php
require "../conexao.php";

$id = $_GET['id'] ?? '';

if ($id != "") {
    $sql = "DELETE FROM perguntas WHERE id = '$id'";
    mysqli_query($conexao, $sql);
}

header("location: lista_perguntas.php");
?>