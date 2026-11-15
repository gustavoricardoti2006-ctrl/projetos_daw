<?php
$pergunta = $_GET['pergunta'] ?? '';
$resposta = $_GET['resposta'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
    echo"sucesso";
}
?>