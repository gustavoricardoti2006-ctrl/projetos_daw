<?php



if (!file_exists("alunos.txt")) {
    $novoarquivo = fopen("alunos.txt", "w") or die("Erro ao abrir arquivo");
    $linha = "Nome;email;cpf;mat\n";
    fwrite($novoarquivo, $linha);
    fclose($novoarquivo);
}

$p = "";
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$mat = $_POST['mat'];

if ($nome != NULL || $email != NULL || $cpf != NULL || $mat != NULL) {
    $novoarquivo = fopen("alunos.txt", "a") or die("Erro ao abrir arquivo");
    $linha = $nome . ";" . $email . ";" . $cpf . ";" . $mat . "\n";
    fwrite($novoarquivo, $linha);
    fclose($novoarquivo);
    $p = "Dados enviados com sucesso: $nome; $email; $cpf; $mat";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="aluno.php" method="post">
        <label for="">Nome aluno</label><input type="text" name="nome">
        <label for="">Email</label><input type="text" name="email">
        <label for="">CPF</label><input type="number" name="cpf">
        <label for="">Matricula</label><input type="number" name="mat">
        <input type="submit" value="">

    </form>
    <?php echo $p ?>
</body>

</html>