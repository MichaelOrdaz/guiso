<?php

include '../../db/conexion.php';

$idMenu=$_POST['idMenu'];

$consulta = "SELECT lapso FROM menu WHERE idMenu = '$idMenu' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$lapso=$columna['lapso'];
}
$resultado = str_replace(" - ",",",$lapso);

echo $resultado;

?>