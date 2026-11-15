<?php
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
    <title>Visualizar pergunta</title>
</head>

<body>
    <?php if (count($dados) > 0) { ?>
        Pergunta: <?php echo $dados[2] ?><br>
        Tipo: <?php echo $dados[1] ?><br>
        Resposta: <?php echo $dados[3] ?><br>
        <?php if ($dados[1] == "multipla") { ?>
            A: <?php echo $dados[4] ?><br>
            B: <?php echo $dados[5] ?><br>
            C: <?php echo $dados[6] ?><br>
            D: <?php echo $dados[7] ?><br>
    <?php }
    } ?>
    <br><a href="lista_perguntas.php">voltar a lista</a>
</body>

</html>