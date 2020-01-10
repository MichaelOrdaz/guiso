<?php

include '../../db/conexion.php';

$cont=0;

$consulta = "SELECT idArticulo,nombre FROM articulo WHERE activo = 1";

$resultado = mysqli_query($conexion,$consulta);

while( $rows[] = mysqli_fetch_object($resultado) );

array_pop($rows);

echo json_encode($rows);

// while($columna=mysqli_fetch_array($resultado)){

// $cont++;
// if ($cont==1) {
// $json='{"idArticulo": "'.$columna['idArticulo'].'","nombre": "'.$columna['nombre'].'"}';
// }
// if ($cont>1) {
// $json.=',{"idArticulo": "'.$columna['idArticulo'].'","nombre": "'.$columna['nombre'].'"}';
// }

// }

// echo json_encode($json, JSON_HEX_APOS | JSON_HEX_QUOT);
