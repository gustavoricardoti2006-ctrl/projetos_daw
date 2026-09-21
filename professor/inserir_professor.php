
<?php

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];

    // Abre o arquivo para adicionar no final
    $arqprof = fopen("prof.txt", "a") or die("Erro ao abrir arquivo");

    // Escreve os dados do professor no arquivo
    fprintf($arqprof, "%s;%s;%s;%s\n", $matricula, $nome, $cpf, $endereco);

    fclose($arqprof);

    $msg = "Professor inserido com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Professor</title>
</head>

<body>

    <form action="inserir_professor.php" method="POST">

        <h3>Insira as informações do professor</h3>

        <br>

        Matrícula
        <input type="number" name="matricula" id="matricula">

        <br><br>

        Nome
        <input type="text" name="nome" id="nome">

        <br><br>

        CPF
        <input type="text" name="cpf" id="cpf">

        <br><br>

        Endereço
        <input type="text" name="endereco" id="endereco">

        <br><br>

        <input type="submit" value="Inserir Professor">

    </form>

    <br>

    <?php echo $msg; ?>

    <br><br>


</body>

</html>
