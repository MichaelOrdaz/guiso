<?php 

include '../../db/conexion.php';

$idMenu=$_POST['idmenu'];
$semana="";
$tiempo="";
$costoTot="";
$elaboro="";

$consulta = "SELECT semana,numTiempos,costoTot,elaboro FROM menu WHERE idMenu='$idMenu' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$semana=$columna['semana'];
$tiempo=$columna['numTiempos'];
$costoTot=$columna['costoTot'];
$elaboro=$columna['elaboro'];
}

echo $semana.",".$tiempo.",".$costoTot.",".$elaboro;

?>