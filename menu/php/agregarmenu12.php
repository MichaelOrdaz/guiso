<?php

error_reporting(0);

include '../../db/conexion.php';

$cont=0;

$consulta = "SELECT idTiempo,descripcion FROM tiempo";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if($cont==1){
$json='{"tiempo": "'.$columna['descripcion'].'","idTiempo": "'.$columna['idTiempo'].'"}';	
}
if($cont>1){
$json.=',{"tiempo": "'.$columna['descripcion'].'","idTiempo": "'.$columna['idTiempo'].'"}';	
}
}

echo json_encode($json);

?>