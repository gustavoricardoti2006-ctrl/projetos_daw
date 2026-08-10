<?php   
$n1 = $_GET["n1"];
$n2 = $_GET["n2"];
$ope = $_GET["op"];

$result = 0;

switch($ope){
    case '+':
    $result = $n1 + $n2;
    echo"$result";
    break;    
    ;

    case '-':
    $result = $n1 - $n2;
    echo"$result";
    break;    
    ;

    case '*':
    $result = $n1 * $n2;
    echo"$result";
    break;    
    ;

    default:
    $result = $n1 / $n2;
    echo"$result";
    break;    
    ;
}





?>