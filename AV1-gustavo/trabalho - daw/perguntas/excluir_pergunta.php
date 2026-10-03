<?php
$id = $_GET['id'] ?? '';
$file = fopen("Perguntas.txt", "r");
$aux = fopen("auxiliar.txt", "w");

fgets($file);
while (!feof($file)) {
    $linha = fgets($file);
    if ($linha != false) {
        $dados = explode(";", $linha);
        if ($id != $dados[0]) fwrite($aux, $linha);
    }
}

fclose($aux);
fclose($file);
$aux = fopen("auxiliar.txt", "r");
$file = fopen("Perguntas.txt", "w");
fwrite($file, "id;tipo;pergunta;resposta;a;b;c;d;\n");
while (!feof($aux)) {
    $linha = fgets($aux);
    if ($linha != false) fwrite($file, $linha);
}

fclose($aux);
fclose($file);
header("location: lista_perguntas.php");
