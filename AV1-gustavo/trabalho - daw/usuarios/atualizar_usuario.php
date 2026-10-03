<?php
$nome_antigo = $_POST['nome_antigo'] ?? '';
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = fopen("Usuarios.txt", "r");
    $aux = fopen("auxiliar.txt", "w");
    fgets($file);
    while (!feof($file)) {
        $linha = fgets($file);
        if ($linha != false) {
            $dados = explode(";", $linha);
            if ($nome_antigo == $dados[0]) {
                $recebe = $nome . ";" . $email . ";" . $senha . "\n";
                fwrite($aux, $recebe);
            } else fwrite($aux, $linha);
        }
    }

    fclose($file);
    fclose($aux);
    $file = fopen("Usuarios.txt", "w");
    $aux = fopen("auxiliar.txt", "r");
    while (!feof($aux)) {
        $linha = fgets($aux);
        if ($linha != false) fwrite($file, $linha);
    }
    fclose($file);
    fclose($aux);
    header("location: lista_usuarios.php");
}

$nome = $_GET['nome'] ?? '';
$file = fopen("Usuarios.txt", "r");
fgets($file);

$nome_user = "";
$email = "";
$senha = "";


while (!feof($file)) {
    $linha = fgets($file);
    if ($linha != false) {
        $dados = explode(";", $linha);
        if ($nome == $dados[0]) {
            $nome_user = $dados[0];
            $email = $dados[1];
            $senha = $dados[2];
            break;
        }
    }
}
fclose($file);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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