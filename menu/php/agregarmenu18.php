<?php

include '../../db/conexion.php';

$nombre=$_POST['nombre'];

$consulta = "SELECT idReceta,costo,porciones FROM receta WhERE nombre='$nombre' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$idReceta=$columna['idReceta'];
$costo=$columna['costo'];
$porciones=$columna['porciones'];
}

echo $idReceta.",".$costo.",".$porciones;

?>