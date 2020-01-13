<?php

include '../../db/conexion.php';

$clave=$_POST['clave'];
$subunidad=$_POST['subunidad'];
$temp=0;

$consulta = "SELECT nombre,subUnidad FROM receta WHERE nombre = '$clave' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$respuesta=explode(",",$columna['subUnidad']);
for ($i=0;$i<COUNT($respuesta);$i++){ 
if($respuesta[$i]==$subunidad){
$temp=1;
}
}
}


echo $temp;

?>