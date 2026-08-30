<?php
$msg = "";
$disciplina = [];
$cont = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $msg = "";
    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
        if ($nome != $colunaDados[0]) {

            echo "veio " . $colunaDados[0] . "\n";

            $disciplina[] = $linha;
            $cont++;
        }
    }


    fclose($arqDisc);
    $arqDisc = fopen("disciplinas.txt", "w") or die("erro ao abrir arquivo");


    for($i = 0; $i < $cont; $i++){
        fwrite($arqDisc, $disciplina[$i]);
    }


    fclose($arqDisc);


    $msg = "Deu tudo certo!!!";
}
?>





<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1>Criar Nova Disciplina</h1>
    <form action="excluir_disc.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        <input type="submit" value="Excluir Disciplina">
    </form>
    <p><?php echo $msg ?></p>
    <br>
</body>

</html>
