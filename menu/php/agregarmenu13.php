<?php

error_reporting(0);

include '../../db/conexion.php';

$temporal=$_POST['temporal'];
$cont=0;

$consulta = "SELECT descripcion FROM tiempo WHERE idTiempo='$temporal' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if($cont==1){
$json='{"tiempo": "'.$columna['descripcion'].'"}';	
}
if($cont>1){
$json.=',{"tiempo": "'.$columna['descripcion'].'"}';	
}
}

echo json_encode($json);

?>