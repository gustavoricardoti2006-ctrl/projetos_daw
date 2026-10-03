<?php
$pergunta = $_POST['pergunta'] ?? '';
$resposta = $_POST['resposta'] ?? '';
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
    $linha = $id . ";texto;" . $pergunta . ";" . $resposta . ";;;;\n";
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
    <form action="inserir_texto.php" method="post">
        Pergunta: <input type="text" name="pergunta"><br>
        Resposta: <input type="text" name="resposta"><br>
        <input type="submit" value="enviar">
    </form>
    <?php echo $msg ?><br>
    <a href="lista_perguntas.php">voltar a lista</a>
</body>

</html>