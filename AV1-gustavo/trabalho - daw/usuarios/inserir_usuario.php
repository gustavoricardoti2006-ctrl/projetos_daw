<?php
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $msg = $linha . "foi incluido com sucesso";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir usuario</title>
</head>

<body>
    <form action="inserir_usuario.php" method="post">
        nome: <input type="text" name="nome"><br>
        email: <input type="text" name="email"><br>
        senha: <input type="text" name="senha"><br>
        <input type="submit" value="enviar">
    </form>
    <?php echo $msg ?>
    <br><a href="lista_usuarios.php">voltar a lista</a>
</body>

</html>