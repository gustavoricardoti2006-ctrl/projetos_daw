<?php

$id = $_GET['id'] ?? '';
$file = fopen("Perguntas.txt", "r");
fgets($file);
$dados = [];
while (!feof($file)) {
    $linha = fgets($file);
    if ($linha != false) {
        $temp = explode(";", $linha);
        if ($id == $temp[0]) {
            $dados = $temp;
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
    <title>Alterar pergunta</title>
</head>

<body>
    <form>
        <input type="hidden" name="id_antigo" id="id_antigo" value="<?php echo $dados[0] ?? '' ?>">
        <input type="hidden" name="tipo" id="tipo" value="<?php echo $dados[1] ?? '' ?>">

        ID: <input type="text" name="id" id="id" value="<?php echo $dados[0] ?? '' ?>"><br>

        Pergunta: <input type="text" name="pergunta" id="pergunta" value="<?php echo $dados[2] ?? '' ?>"><br>

        Resposta: <input type="text" name="resposta" id="resposta" value="<?php echo $dados[3] ?? '' ?>"><br>

        <?php if (($dados[1] ?? '') == "multipla") { ?>
            A: <input type="text" name="a" id="a" value="<?php echo $dados[4] ?? '' ?>"><br>
            B: <input type="text" name="b" id="b" value="<?php echo $dados[5] ?? '' ?>"><br>
            C: <input type="text" name="c" id="c" value="<?php echo $dados[6] ?? '' ?>"><br>
            D: <input type="text" name="d" id="d" value="<?php echo $dados[7] ?? '' ?>"><br>
        <?php } ?>

        <input type="submit" value="enviar" onclick="enviarCalculo()">
    </form>


</body>

</html>

<script>
    function enviarCalculo() {
        let id_antigo = document.getElementById("id_antigo").value;
        let id = document.getElementById("id").value;
        let tipo = document.getElementById("tipo").value;
        let pergunta = document.getElementById("pergunta").value;
        let resposta = document.getElementById("resposta").value;

        let a = "";
        let b = "";
        let c = "";
        let d = "";

        if (tipo == "multipla") {
            a = document.getElementById("a").value;
            b = document.getElementById("b").value;
            c = document.getElementById("c").value;
            d = document.getElementById("d").value;
        }

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
        let url = "atualizar_pergunta.php?id_antigo=" + encodeURIComponent(id_antigo) +
            "&id=" + encodeURIComponent(id) +
            "&tipo=" + encodeURIComponent(tipo) +
            "&pergunta=" + encodeURIComponent(pergunta) +
            "&resposta=" + encodeURIComponent(resposta) +
            "&a=" + encodeURIComponent(a) +
            "&b=" + encodeURIComponent(b) +
            "&c=" + encodeURIComponent(c) +
            "&d=" + encodeURIComponent(d);

        xhr.open("GET", url, true);
        xhr.send();
    }
</script>