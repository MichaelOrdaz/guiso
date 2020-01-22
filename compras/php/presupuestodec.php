<?php

include '../../db/conexion.php';

$cont=0;

$consulta = "SELECT idOC FROM oc WHERE status = '2' ORDER BY fecha desc";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if ($cont==1) {
$json='{"idOC": "'.$columna['idOC'].'"}';
}
if ($cont>1) {
$json.=',{"idOC": "'.$columna['idOC'].'"}';
}
}

echo json_encode($json);
?>