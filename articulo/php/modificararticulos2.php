<?php

include '../../db/conexion.php';

$id=$_POST['id'];

$cont=0;

$consulta = "SELECT descripcion FROM linea  WHERE idLinea = '$id' ";

$resultado = mysqli_query($conexion,$consulta);

while( $rows[] = mysqli_fetch_object($resultado) );

array_pop($rows);

echo json_encode($rows);


// while($columna=mysqli_fetch_array($resultado)){
// $cont++;
// if ($cont==1) {
// $json='{"descripcion": "'.$columna['descripcion'].'"}';
// }
// if ($cont>1) {
// $json.=',{"descripcion": "'.$columna['descripcion'].'"}';
// }
// }

// $consulta = "SELECT descripcion FROM linea ";

// $resultado = mysqli_query($conexion,$consulta);
// while($columna=mysqli_fetch_array($resultado)){
// $json.=',{"descripcion": "'.$columna['descripcion'].'"}';
// }

// echo json_encode($json, JSON_HEX_APOS | JSON_HEX_QUOT);
