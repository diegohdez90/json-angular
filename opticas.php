<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "veotek", "opticas");

$result = $conn->query("SELECT * FROM optica");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Id":"'  . $rs["idoptica"] . '",';
    $outp .= '"Nombre":"'   . $rs["nombre"]        . '",';
    $outp .= '"Direccion":"'. $rs["ubicacion"] . '",';
    $outp .= '"Responsable":"'. $rs["responsable"] . '",';
    $outp .= '"Extension":"'. $rs["ext"] . '",';
    $outp .= '"Telefono":"'. $rs["telefono"] . '",';
    $outp .= '"Email":"'. $rs["email"]     . '",';     
    $outp .= '"Ciudad":"'. $rs["ciudad"]     . '",';     
    $outp .= '"Estado":"'. $rs["estado"]     . '"}';     
}
$outp ='{"results":['.$outp.']}';
$conn->close();

echo($outp);
?>