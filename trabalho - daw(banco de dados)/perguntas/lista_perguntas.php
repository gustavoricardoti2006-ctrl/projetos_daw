<?php
require "../conexao.php";

$resultado = mysqli_query($conexao, "SELECT * FROM perguntas");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Perguntas</title>
</head>
<body>
    <a href="inserir_multipla.php">inserir pergunta multipla</a><br>
    <a href="inserir_texto.php">inserir pergunta texto</a>
    <br><br>
    <table border="1">
        <tr>
            <td>id</td>
            <td>tipo</td>
            <td>pergunta</td>
            <td>resposta</td>
            <td></td>
        </tr>
        <?php while ($dados = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $dados['id'] ?></td>
                <td><?php echo $dados['tipo'] ?></td>
                <td><?php echo $dados['pergunta'] ?></td>
                <td><?php echo $dados['resposta'] ?></td>
                <td>
                    <a href="visualizar_pergunta.php?id=<?php echo $dados['id'] ?>">visualizar</a>
                    <a href="atualizar_pergunta.php?id=<?php echo $dados['id'] ?>">editar</a>
                    <a href="excluir_pergunta.php?id=<?php echo $dados['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><a href="../index.php">voltar</a>
</body>
</html>