<?php

include '../../db/conexion.php';

$nombre=$_POST['nombre'];
$id=$_POST['id'];
$subunidad=$_POST['subunidad'];

$idreceta="";
$costo="";

$consulta = "SELECT idReceta,costo,subUnidad FROM receta WHERE nombre = '$nombre' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){

$respuesta=explode(",",$columna['subUnidad']);

for ($i=0;$i<COUNT($respuesta);$i++){ 
if($respuesta[$i]==$subunidad){
$idreceta=$columna['idReceta'];
$costo=$columna['costo'];
}
}

}

echo $id.','.$idreceta.','.ROUND($costo,2);

?>