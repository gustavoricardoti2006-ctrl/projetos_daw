<?php


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $pergunta = $_GET['pergunta'] ?? '';
    $a = $_GET['a'] ?? '';
    $b = $_GET['b'] ?? '';
    $c = $_GET['c'] ?? '';
    $d = $_GET['d'] ?? '';
    $correta = $_GET['correta'] ?? '';
    $msg = "";
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
    echo"sucesso";
}
