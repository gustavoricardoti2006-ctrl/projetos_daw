
<?php

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

    <form onsubmit="enviarCalculo(); return false;">

        <input type="hidden" id="nome_antigo" value="<?php echo $nome_user; ?>">

        Nome: <input type="text" id="nome" value="<?php echo $nome_user; ?>"><br>

        Email: <input type="text" id="email" value="<?php echo $email; ?>"><br>

        Senha: <input type="text" id="senha" value="<?php echo $senha; ?>"><br>

        <input type="submit" value="Enviar">

    </form>

    <script>
        function enviarCalculo() {

            let nome_antigo = document.getElementById("nome_antigo").value;
            let nome = document.getElementById("nome").value;
            let email = document.getElementById("email").value;
            let senha = document.getElementById("senha").value;

            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                if (xhr.readyState == 4 && xhr.status == 200) {

                    if (xhr.responseText.trim() == "sucesso") {
                        window.location.href = "lista_usuarios.php";
                    } else {
                        alert(xhr.responseText);
                    }

                }
            };

            let url = "atualizar_usuario.php?nome_antigo=" + encodeURIComponent(nome_antigo) +
                "&nome=" + encodeURIComponent(nome) +
                "&email=" + encodeURIComponent(email) +
                "&senha=" + encodeURIComponent(senha);

            xhr.open("GET", url, true);
            xhr.send();
        }
    </script>

</body>
</html>
