<?php

include '../../db/conexion.php';

$cont=0;

if($cont==0){
$json='{"idMenu": "no hay menus"}';
}

$consulta = "SELECT idMenu FROM menu ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if ($cont==1) {
$json='{"idMenu": "'.$columna['idMenu'].'"}';
}
if ($cont>1) {
$json.=',{"idMenu": "'.$columna['idMenu'].'"}';
}
}

echo json_encode($json);

?>