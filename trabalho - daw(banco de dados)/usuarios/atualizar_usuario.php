<?php
require "../conexao.php";

$nome_antigo = $_POST['nome_antigo'] ?? '';
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE nome='$nome_antigo'";
    mysqli_query($conexao, $sql);
    header("location: lista_usuarios.php");
}

// Buscar dados para preencher o formulário
$nome_get = $_GET['nome'] ?? '';
$sql = "SELECT * FROM usuarios WHERE nome = '$nome_get'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);

$nome_user = $dados['nome'] ?? '';
$email = $dados['email'] ?? '';
$senha = $dados['senha'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Alterar usuario</title>
</head>
<body>
    <form action="atualizar_usuario.php" method="POST">
        <input type="hidden" name="nome_antigo" value="<?php echo $nome_user; ?>">
        nome: <input type="text" name="nome" value="<?php echo $nome_user ?>"><br>
        email: <input type="text" name="email" value="<?php echo $email ?>"><br>
        senha: <input type="text" name="senha" value="<?php echo $senha ?>"><br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>