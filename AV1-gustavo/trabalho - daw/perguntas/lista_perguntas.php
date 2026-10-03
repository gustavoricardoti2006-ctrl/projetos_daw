<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php
        if (file_exists("Perguntas.txt")) {
            $file = fopen("Perguntas.txt", "r");
            fgets($file);
            while (!feof($file)) {
                $linha = fgets($file);
                if ($linha != false) {
                    $dados = explode(";", $linha);
        ?>
                    <tr>
                        <td><?php echo $dados[0] ?></td>
                        <td><?php echo $dados[1] ?></td>
                        <td><?php echo $dados[2] ?></td>
                        <td><?php echo $dados[3] ?></td>
                        <td><a href="visualizar_pergunta.php?id=<?php echo $dados[0] ?>">visualizar</a>
                            <a href="atualizar_pergunta.php?id=<?php echo $dados[0] ?>">editar</a>
                            <a href="excluir_pergunta.php?id=<?php echo $dados[0] ?>">Excluir</a>
                        </td>
                    </tr>
        <?php }
            }
            fclose($file);
        } ?>
    </table>
    <br><a href="../index.php">voltar</a>
</body>

</html>