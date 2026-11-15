
<?php

$nome = $_GET["nome"];

if (file_exists("Usuarios.txt")) {

    $file = fopen("Usuarios.txt", "r");

    $linhas = [];

    $cabecalho = fgets($file);
    $linhas[] = $cabecalho;

    while (!feof($file)) {

        $linha = fgets($file);

        if ($linha != false) {

            $dados = explode(";", $linha);

            if (trim($dados[0]) != $nome) {
                $linhas[] = $linha;
            }

        }
    }

    fclose($file);

    file_put_contents("Usuarios.txt", implode("", $linhas));

    echo "sucesso";

} else {
    echo "Arquivo não encontrado";
}

?>
