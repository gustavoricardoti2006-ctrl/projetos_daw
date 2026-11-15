
<?php
$nome = $_GET["nome"];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Excluir usuário</title>
</head>

<body>

    <h2>Deseja realmente excluir este usuário?</h2>

    <button onclick="excluirUsuario()">Sim, excluir</button>

    <a href="lista_usuarios.php">Cancelar</a>

    <script>
        function excluirUsuario() {

            let nome = <?php echo json_encode($nome); ?>;

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

            let url = "excluir_usuario_ajax.php?nome=" + encodeURIComponent(nome);

            xhr.open("GET", url, true);
            xhr.send();
        }
    </script>

</body>
</html>
