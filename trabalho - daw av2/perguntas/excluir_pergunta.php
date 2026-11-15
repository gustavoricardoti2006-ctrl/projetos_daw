
<?php
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Excluir pergunta</title>
</head>

<body>

    <h2>Deseja realmente excluir esta pergunta?</h2>

    <button onclick="excluirPergunta()">Sim, excluir</button>

    <a href="lista_perguntas.php">Cancelar</a>

    <script>
        function excluirPergunta() {

            let id = <?php echo json_encode($id); ?>;

            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                if (xhr.readyState == 4 && xhr.status == 200) {

                    if (xhr.responseText.trim() == "sucesso") {
                        window.location.href = "lista_perguntas.php";
                    } else {
                        alert(xhr.responseText);
                    }

                }
            };

            let url = "excluir_pergunta_ajax.php?id=" + encodeURIComponent(id);

            xhr.open("GET", url, true);
            xhr.send();
        }
    </script>

</body>
</html>
