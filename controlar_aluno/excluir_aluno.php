<?php

$msg = "";
$disciplina = [];
$cont = 0;

$nome = $_GET['nome'];

$arqDisc = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");

while (($linha = fgets($arqDisc)) !== false) {

    $colunaDados = explode(";", $linha);

    if ($nome != $colunaDados[0]) {
        $disciplina[] = $linha;
        $cont++;
    }
}

fclose($arqDisc);

$arqDisc = fopen("alunos.txt", "w") or die("Erro ao abrir arquivo");

for ($i = 0; $i < $cont; $i++) {
    fwrite($arqDisc, $disciplina[$i]);
}

fclose($arqDisc);

header("Location: listar_aluno.php");
exit;

?>