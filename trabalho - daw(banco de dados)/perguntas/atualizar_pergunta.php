<?php
require "../conexao.php";

$id_antigo = $_POST['id_antigo'] ?? '';
$id = $_POST['id'] ?? '';
$pergunta = $_POST['pergunta'] ?? '';
$resposta = $_POST['resposta'] ?? '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$c = $_POST['c'] ?? '';
$d = $_POST['d'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE perguntas 
            SET id='$id', pergunta='$pergunta', resposta='$resposta', 
                a='$a', b='$b', c='$c', d='$d' 
            WHERE id='$id_antigo'";
    mysqli_query($conexao, $sql);
    header("location: lista_perguntas.php");
}

$id_get = $_GET['id'] ?? '';
$sql = "SELECT * FROM perguntas WHERE id = '$id_get'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado) ?? [];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Alterar pergunta</title>
</head>
<body>
    <form action="atualizar_pergunta.php" method="POST">
        <input type="hidden" name="id_antigo" value="<?php echo $dados['id'] ?? '' ?>">
        ID: <input type="text" name="id" value="<?php echo $dados['id'] ?? '' ?>"><br>
        Pergunta: <input type="text" name="pergunta" value="<?php echo $dados['pergunta'] ?? '' ?>"><br>
        Resposta: <input type="text" name="resposta" value="<?php echo $dados['resposta'] ?? '' ?>"><br>
        <?php if (($dados['tipo'] ?? '') == "multipla") { ?>
            A: <input type="text" name="a" value="<?php echo $dados['a'] ?? '' ?>"><br>
            B: <input type="text" name="b" value="<?php echo $dados['b'] ?? '' ?>"><br>
            C: <input type="text" name="c" value="<?php echo $dados['c'] ?? '' ?>"><br>
            D: <input type="text" name="d" value="<?php echo $dados['d'] ?? '' ?>"><br>
        <?php } ?>
        <input type="submit" value="enviar">
    </form>
</body>
</html>