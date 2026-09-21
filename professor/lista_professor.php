
<?php
$arqprof = fopen("prof.txt", "r") or die("Erro ao abrir arquivo");

// Lê a primeira linha, que é o cabeçalho
$linha = fgets($arqprof);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Professores</title>
</head>
<body>

    <h2>Lista de Professores</h2>

    <table border="1">

        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Alterar</th>
        </tr>
        <?php

        while(!feof($arqprof)) {

            $linha = fgets($arqprof);

            if($linha !== false) {

                $colunaDados = explode(";", $linha);

                if(count($colunaDados) >= 4) {

                    echo "<tr>";
                    echo "<td>" . $colunaDados[0] . "</td>";
                    echo "<td>" . $colunaDados[1] . "</td>";
                    echo "<td>" . $colunaDados[2] . "</td>";
                    echo "<td>" . $colunaDados[3] . "</td>";
                    echo "<td>";
                    echo "<a href='alterar_professor.php?matricula=" . $colunaDados[0] . "'>Alterar</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            }
        }
        fclose($arqprof);
        ?>

    </table>

    <br>

    <a href="inserir_professor.php">
        Inserir novo professor
    </a>
</body>

</html>

