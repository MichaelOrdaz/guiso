<?php

include '../../db/conexion.php';

$subunidad=$_POST['subunidad'];
$cont=0;

$consulta = "SELECT idReceta,nombre,subUnidad FROM receta";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){

$respuesta=explode(",",$columna['subUnidad']);

for ($i=0;$i<COUNT($respuesta);$i++){ 
if($respuesta[$i]==$subunidad){
$cont++;
if ($cont==1) {
$json='{"idReceta": "'.$columna['idReceta'].'","nombre": "'.$columna['nombre'].'"}';
}
if ($cont>1) {
$json.=',{"idReceta": "'.$columna['idReceta'].'","nombre": "'.$columna['nombre'].'"}';
}
}
}

}

echo json_encode($json);
?>