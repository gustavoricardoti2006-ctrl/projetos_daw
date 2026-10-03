<?php
$nome = $_GET['nome'] ?? '';
$file = fopen("Usuarios.txt", "r");
$aux = fopen("auxiliar.txt", "w");
fgets($file);
while (!feof($file)) {
    $linha = fgets($file);
    if ($linha != false) {
        $dados = explode(";", $linha);
        if ($nome != $dados[0]) fwrite($aux, $linha);
    }
}
fclose($aux);
fclose($file);
$aux = fopen("auxiliar.txt", "r");
$file = fopen("Usuarios.txt", "w");
fwrite($file, "nome;email;senha;\n");
while (!feof($aux)) {
    $linha = fgets($aux);
    if ($linha != false) fwrite($file, $linha);
}
fclose($aux);
fclose($file);
header("location: lista_usuarios.php");
