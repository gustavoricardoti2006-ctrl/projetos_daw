
<?php
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST['idpergunta'] ?? 0;
$titulo = $_POST['pergunta'] ?? '';

$r1 = $_POST['p1'] ?? '';



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
        fclose($resposta);
        fclose($pergunta);
        break;
    }
}

fclose($pergunta);



if($existe != 1){
$pergunta = fopen("pergunta.txt", "a") or die("erro ao abrir arquivo");

$linha = $id.";".$titulo."\n";
fwrite($pergunta, $linha);

$linha = $i.";".$id.";".$array[$i].";1\n";
fwrite($resposta, $linha);

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
    <form action="pergunta_include_ext.php" method="post">
      ID: <input type="number" name="idpergunta">
      Titulo: <input type="text" name="pergunta">
      
      resposta 1:<input type="text" name="p1">

      <input type="submit" value="enviar">

      <a href="pergunta_include.php">Pergunta multipla escolha</a>
    </form>
</body>
</html>