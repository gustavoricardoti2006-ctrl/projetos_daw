
<?php

$nome_antigo = $_GET['nome_antigo'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$file = fopen("Usuarios.txt", "r");

$linhas = [];

$cabecalho = fgets($file);
$linhas[] = $cabecalho;

while (!feof($file)) {

    $linha = fgets($file);

    if ($linha != false) {

        $dados = explode(";", $linha);

        if ($dados[0] == $nome_antigo) {

            $linhas[] = $nome . ";" . $email . ";" . $senha . "\n";
        } else {

            $linhas[] = $linha;
        }
    }
}

fclose($file);

$file = fopen("Usuarios.txt", "w");

foreach ($linhas as $linha) {
    fwrite($file, $linha);
}

fclose($file);

echo "sucesso";

?>
