<?php
require "../conexao.php";

$id = $_POST['id'] ?? '';
$pergunta = $_POST['pergunta'] ?? '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$c = $_POST['c'] ?? '';
$d = $_POST['d'] ?? '';
$correta = $_POST['correta'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO perguntas (id, tipo, pergunta, resposta, a, b, c, d) 
            VALUES ('$id', 'multipla', '$pergunta', '$correta', '$a', '$b', '$c', '$d')";
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
    <form action="inserir_multipla.php" method="post">
        Id: <input type="number" name="id"><br>
        Pergunta: <input type="text" name="pergunta"><br>
        Alternativa A: <input type="text" name="a"><br>
        Alternativa B: <input type="text" name="b"><br>
        Alternativa C: <input type="text" name="c"><br>
        Alternativa D: <input type="text" name="d"><br>
        Resposta correta:
        <select name="correta">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select><br>
        <input type="submit" value="enviar">
    </form>
    <?php echo $msg ?><br>
    <a href="lista_perguntas.php">voltar a lista</a>
</body>
</html>