<?php
$pergunta = $_POST['pergunta'] ?? '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$c = $_POST['c'] ?? '';
$d = $_POST['d'] ?? '';
$correta = $_POST['correta'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!file_exists("Perguntas.txt")) {
        $file = fopen("Perguntas.txt", "w");
        fwrite($file, "id;tipo;pergunta;resposta;a;b;c;d;\n");
        fclose($file);
    }

    $file = fopen("Perguntas.txt", "a");
    $id = 1;
    $leitura = fopen("Perguntas.txt", "r");
    while (!feof($leitura)) {
        $linha = fgets($leitura);
        if ($linha != false) $id++;
    }
    
    fclose($leitura);
    $linha = $id . ";multipla;" . $pergunta . ";" . $correta . ";" . $a . ";" . $b . ";" . $c . ";" . $d . "\n";
    fwrite($file, $linha);
    fclose($file);
    $msg = "pergunta incluida com sucesso";
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova pergunta</title>
</head>

<body>
    <form action="inserir_multipla.php" method="post">
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