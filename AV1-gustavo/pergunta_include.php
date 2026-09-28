
<?php
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST['idpergunta'] ?? 0;
$titulo = $_POST['pergunta'] ?? '';

$r1 = $_POST['p1'] ?? '';
$r2 = $_POST['p2'] ?? '';
$r3 = $_POST['p3'] ?? '';
$r4 = $_POST['p4'] ?? '';

$array[] = [$r1, $r2, $r3, $r4];

$certa = $_POST['resposta_certa'] ?? '';


if (!file_exists("pergunta.txt")) {
    $novoarquivo = fopen("pergunta.txt", "w") or die("Erro ao abrir arquivo");
    $linha = "id;pergunta\n";
    fwrite($novoarquivo, $linha);
    fclose($novoarquivo);
}

if (!file_exists("resposta.txt")) {
    $novoarquivo = fopen("resposta.txt", "w") or die("Erro ao abrir arquivo");
    $linha = "id;idpergunta;reposta;certa\n";
    fwrite($novoarquivo, $linha);
    fclose($novoarquivo);
}


$pergunta = fopen("pergunta.txt", "r") or die("erro ao abrir arquivo");
$resposta = fopen("resposta.txt", "a") or die("erro ao abrir arquivo");
$existe = 0;

while(!feof($pergunta)){
    $linha = fgets($pergunta);
    $dados = explode(";",$linha);

    if($dados[0] == $id){
        $existe = 1;
        break;
    }
}

fclose($pergunta);



if($existe != 1){
$pergunta = fopen("pergunta.txt", "a") or die("erro ao abrir arquivo");
$linha = $id.";".$titulo."\n";
fwrite($pergunta, $linha);

for($i = 1; $i <= 4; $i++){
    if($array[$i] == $certa){
        $linha = $i.";".$id.";".$array[$i].";1\n";
        fwrite($resposta, $linha);
    }
    else{
        $linha = $i.";".$id.";".$array[$i].";0\n";
        fwrite($resposta, $linha);
    }
}


}
fclose($pergunta);
fclose($resposta);
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
    <form action="pergunta_include.php" method="post">
      ID: <input type="number" name="idpergunta">
      Titulo: <input type="text" name="pergunta">
      
      escolha 1:<input type="text" name="p1">
      escolha 2:<input type="text" name="p2">
      escolha 3:<input type="text" name="p3">
      escolha 4:<input type="text" name="p4">

      <input type="text" name="resposta_certa">

      <input type="submit" value="enviar">
      <a href="pergunta_include_ext.php">Pergunta por extensa</a>
    </form>
</body>
</html>