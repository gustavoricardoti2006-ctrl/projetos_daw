<?php
$nome = $_GET['nome'] ?? '';
$email = $_GET['email'] ?? '';
$senha = $_GET['senha'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!file_exists("Usuarios.txt")) {
        $file = fopen("Usuarios.txt", "w");
        $linha = "nome;email;senha;\n";
        fwrite($file, $linha);
        fclose($file);
    }
    $file = fopen("Usuarios.txt", "a");
    if ($nome != NULL || $email != NULL || $senha != NULL) {
        $linha = $nome . ";" . $email . ";" . $senha . "\n";
        fwrite($file, $linha);
        fclose($file);
    }

    echo"sucesso";
}

?>