<?php
require "../conexao.php";

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM perguntas WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Visualizar pergunta</title>
</head>
<body>
    <?php if ($dados) { ?>
        Pergunta: <?php echo $dados['pergunta'] ?><br>
        Tipo: <?php echo $dados['tipo'] ?><br>
        Resposta: <?php echo $dados['resposta'] ?><br>
        <?php if ($dados['tipo'] == "multipla") { ?>
            A: <?php echo $dados['a'] ?><br>
            B: <?php echo $dados['b'] ?><br>
            C: <?php echo $dados['c'] ?><br>
            D: <?php echo $dados['d'] ?><br>
        <?php } ?>
    <?php } else { ?>
        Pergunta não encontrada.
    <?php } ?>
    <br><a href="lista_perguntas.php">voltar a lista</a>
</body>
</html>