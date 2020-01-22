<?php

include '../../db/conexion.php';

$subunidad=$_POST['subunidad'];
$tiempo=$_POST['tiempo'];

$cont=0;

$consulta = "SELECT idReceta,nombre,tiempo,subUnidad FROM receta";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){

$respuesta=explode(",",$columna['subUnidad']);

for ($i=0;$i<COUNT($respuesta);$i++){ 
if(($respuesta[$i]==$subunidad)&&($columna['tiempo']==$tiempo)){
$cont++;
if ($cont==1){
$json=$columna['nombre'];
}
if ($cont>1) {
$json.=",".$columna['nombre'];
}
}
}

}

echo $json;
?>