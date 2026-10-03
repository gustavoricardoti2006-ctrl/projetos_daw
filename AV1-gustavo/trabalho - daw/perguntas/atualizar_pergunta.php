<?php
$id_antigo = $_POST['id_antigo'] ?? '';
$id = $_POST['id'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$pergunta = $_POST['pergunta'] ?? '';
$resposta = $_POST['resposta'] ?? '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$c = $_POST['c'] ?? '';
$d = $_POST['d'] ?? '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = fopen("Perguntas.txt", "r");
    $aux = fopen("auxiliar.txt", "w");
    fgets($file);
    while (!feof($file)) {
        $linha = fgets($file);
        if ($linha != false) {
            $dados = explode(";", $linha);
            if ($id_antigo == $dados[0]) {
                $recebe = $id . ";" . $tipo . ";" . $pergunta . ";" . $resposta . ";" . $a . ";" . $b . ";" . $c . ";" . $d . "\n";
                fwrite($aux, $recebe);
            } else fwrite($aux, $linha);
        }
    }
    fclose($file);
    fclose($aux);
    $file = fopen("Perguntas.txt", "w");
    fwrite($file, "id;tipo;pergunta;resposta;a;b;c;d;\n");
    $aux = fopen("auxiliar.txt", "r");
    while (!feof($aux)) {
        $linha = fgets($aux);
        if ($linha != false) fwrite($file, $linha);
    }
    fclose($file);
    fclose($aux);
    header("location: lista_perguntas.php");
}


$id = $_GET['id'] ?? '';
$file = fopen("Perguntas.txt", "r");
fgets($file);
$dados = [];
while (!feof($file)) {
    $linha = fgets($file);
    if ($linha != false) {
        $temp = explode(";", $linha);
        if ($id == $temp[0]) {
            $dados = $temp;
            break;
        }
    }
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar pergunta</title>
</head>

<body>
    <form action="atualizar_pergunta.php" method="POST">
        <input type="hidden" name="id_antigo" value="<?php echo $dados[0] ?? '' ?>">
        <input type="hidden" name="tipo" value="<?php echo $dados[1] ?? '' ?>">
        ID: <input type="text" name="id" value="<?php echo $dados[0] ?? '' ?>"><br>
        Pergunta: <input type="text" name="pergunta" value="<?php echo $dados[2] ?? '' ?>"><br>
        Resposta: <input type="text" name="resposta" value="<?php echo $dados[3] ?? '' ?>"><br>
        <?php if (($dados[1] ?? '') == "multipla") { ?>
            A: <input type="text" name="a" value="<?php echo $dados[4] ?? '' ?>"><br>
            B: <input type="text" name="b" value="<?php echo $dados[5] ?? '' ?>"><br>
            C: <input type="text" name="c" value="<?php echo $dados[6] ?? '' ?>"><br>
            D: <input type="text" name="d" value="<?php echo $dados[7] ?? '' ?>"><br>
        <?php } ?>
        <input type="submit" value="enviar">
    </form>
</body>

</html>