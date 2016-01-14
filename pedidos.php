<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "veotek", "inventario1");

$result = $conn->query("SELECT * FROM pedido");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Folio":"'  . $rs["folio"] . '",';
    $outp .= '"Referencia":"'   . $rs["ref"]        . '",';
    $outp .= '"Materiales":"'. $rs["materiales"] . '",';
    $outp .= '"Micas":"'. $rs["micas"] . '",';
    $outp .= '"Armazones":"'. $rs["armazon"] . '",';
    $outp .= '"Tratamiento":"'. $rs["tratamiento"] . '",';
    $outp .= '"Tipos":"'. $rs["tipo"]     . '"}';     
}
$outp ='{"results":['.$outp.']}';
$conn->close();

echo($outp);
?>