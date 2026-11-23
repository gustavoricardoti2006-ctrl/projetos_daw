<?php
require "../conexao.php";

$resultado = mysqli_query($conexao, "SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>
<body>
    <a href="inserir_usuario.php">inserir usuario</a>
    <br><br>
    <table border="1">
        <tr>
            <td>nome</td>
            <td>email</td>
            <td>senha</td>
            <td></td>
        </tr>
        <?php while ($dados = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $dados['nome'] ?></td>
                <td><?php echo $dados['email'] ?></td>
                <td><?php echo $dados['senha'] ?></td>
                <td>
                    <a href="excluir_usuario.php?nome=<?php echo $dados['nome'] ?>">Excluir</a>
                    <a href="atualizar_usuario.php?nome=<?php echo $dados['nome'] ?>">editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><a href="../index.php">voltar</a>
</body>
</html>