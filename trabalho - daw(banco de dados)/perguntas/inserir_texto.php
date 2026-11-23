<?php
require "../conexao.php";

$id = $_POST['id'] ?? '';
$pergunta = $_POST['pergunta'] ?? '';
$resposta = $_POST['resposta'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO perguntas (id, tipo, pergunta, resposta) VALUES ('$id', 'texto', '$pergunta', '$resposta')";
    if (mysqli_query($conexao, $sql)) {
        $msg = "pergunta incluida com sucesso";
    } else {
        $msg = "Erro: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Nova pergunta</title>
</head>
<body>
    <form action="inserir_texto.php" method="post">
        id:<input type="number" name="id"><br>
        Pergunta: <input type="text" name="pergunta"><br>
        Resposta: <input type="text" name="resposta"><br>
        <input type="submit" value="enviar">
    </form>
    <?php echo $msg ?><br>
    <a href="lista_perguntas.php">voltar a lista</a>
</body>
</html>