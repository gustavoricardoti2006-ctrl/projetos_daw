<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>

<body>

    <table border="1">

        <?php
        $arqDisc = fopen("alunos.txt", "r") or die("erro ao abrir arquivo");

        while (!feof($arqDisc)) {

            $linha = fgets($arqDisc);

            if ($linha != false) {

                $colunaDados = explode(";", trim($linha));
        ?>

                <tr>
                    <td><?php echo $colunaDados[0]; ?></td>
                    <td><?php echo $colunaDados[1]; ?></td>
                    <td><?php echo $colunaDados[2]; ?></td>
                    <td><?php echo $colunaDados[3]; ?></td>
                    <td><a href="editar_aluno.php?nome=<?php echo ($colunaDados[0]); ?>">editar</a></td>
                    <td><a href="excluir_aluno.php?nome=<?php echo($colunaDados[0]); ?>" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">excluir </a></td>
                </tr>

        <?php
            }
        } fclose($arqDisc);
        ?>

    </table>

</body>

</html>