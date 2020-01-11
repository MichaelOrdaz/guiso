<?php

include '../../db/conexion.php';

$json="";

$cont=0;
$consulta = "SELECT descripcion FROM linea";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$cont++;
if($cont==1){
$json='{"linea": "'.$columna['descripcion'].'"}';
}
if($cont!=1){
$json.=',{"linea": "'.$columna['descripcion'].'"}';
}
}

echo json_encode($json);
?>