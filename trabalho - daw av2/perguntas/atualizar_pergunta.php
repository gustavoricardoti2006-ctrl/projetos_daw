<?php



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_antigo = $_GET['id_antigo'] ?? '';
    $id = $_GET['id'] ?? '';
    $tipo = $_GET['tipo'] ?? '';
    $pergunta = $_GET['pergunta'] ?? '';
    $resposta = $_GET['resposta'] ?? '';
    $a = $_GET['a'] ?? '';
    $b = $_GET['b'] ?? '';
    $c = $_GET['c'] ?? '';
    $d = $_GET['d'] ?? '';

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
    echo "sucesso";
}
