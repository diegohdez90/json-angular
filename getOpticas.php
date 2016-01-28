<?php
//include("connection.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=iso-8859-1");


//$result = $conn->query("select * from pedido") or die($conn->error);

$conn = new mysqli("localhost", "root", "veotek", "opticas");

$result = $conn->query("SELECT * FROM optica WHERE idoptica>85");

$registros = array();
$outp = "";
while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
/*    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Folio":"'  . $rs["folio"] . '",';
    $outp .= '"Referencia":"'   . $rs["ref"]        . '",';
    $outp .= '"Materiales":"'. $rs["materiales"] . '",';
    $outp .= '"Micas":"'. $rs["micas"] . '",';
    $outp .= '"Armazones":"'. $rs["armazon"] . '",';
    $outp .= '"Tratamiento":"'. $rs["tratamiento"] . '",';
    $outp .= '"Tipos":"'. $rs["tipo"]     . '"}';     */
	$registros[] = $rs;
//	echo json_last_error_msg()."<br>";
}
//$outp ='{"results":['.$outp.']}';
$json_response = json_encode($registros);
echo ($json_response);
//echo ("The Output: ".	$outp);
//print_r($registros);
$conn->close();
?>