<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php
        if (file_exists("Usuarios.txt")) {
            $file = fopen("Usuarios.txt", "r");
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
                        <td><a href="excluir_usuario.php?nome=<?php echo $dados[0] ?>">Excluir</a>
                            <a href="atualizar_usuario.php?nome=<?php echo $dados[0] ?>">editar</a>
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