<?php
require "../conexao.php";

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($nome != "" && $email != "" && $senha != "") {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if (mysqli_query($conexao, $sql)) {
            $msg = "usuario $nome incluido com sucesso";
        } else {
            $msg = "Erro: " . mysqli_error($conexao);
        }
    } else {
        $msg = "Preencha todos os campos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
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