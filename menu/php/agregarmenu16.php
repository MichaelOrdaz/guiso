<?php

include '../../db/conexion.php';

$nombre=$_POST['nombre'];
$subunidad=$_POST['subunidad'];
$costo="";

$consulta = "SELECT costo,subUnidad FROM receta WHERE nombre = '$nombre' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){

$respuesta=explode(",",$columna['subUnidad']);

for ($i=0;$i<COUNT($respuesta);$i++){ 
if($respuesta[$i]==$subunidad){
$costo=$columna['costo'];
}
}

}

echo $costo;

?>