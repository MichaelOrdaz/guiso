<?php

include '../../db/conexion.php';

$cont=0;
$consulta = "SELECT idUnidad,unidad FROM unidad ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if ($cont==1) {
$unidad='{"idunidad": "'.$columna['idUnidad'].'","unidad": "'.$columna['unidad'].'"}';
}
if ($cont>1) {
$unidad.=',{"idunidad": "'.$columna['idUnidad'].'","unidad": "'.$columna['unidad'].'"}';
}
}

echo json_encode($unidad);
?>