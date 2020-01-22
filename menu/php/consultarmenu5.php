<?php 

include '../../db/conexion.php';

$idMenu=$_POST['idmenu'];
$semana="";
$tiempo="";
$costoTot="";
$elaboro="";
$unidad="";
$subunidad="";
$grupo="";
$anio="";
$nombre="";
$cliente="";

$consulta = "SELECT anio,semana,numTiempos,costoTot,elaboro,unidad,subUnidad,grupo,cliente,numTiempos FROM menu WHERE idMenu='$idMenu' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$anio=$columna['anio'];
$semana=$columna['semana'];
$tiempo=$columna['numTiempos'];
$costoTot=$columna['costoTot'];
$elaboro=$columna['elaboro'];
$unidad=$columna['unidad'];
$subunidad=$columna['subUnidad'];
$grupo=$columna['grupo'];
$cliente=$columna['cliente'];
$tiempo=$columna['numTiempos'];
}

echo $semana.",".$tiempo.",".$costoTot.",".$elaboro.",".$unidad.",".$subunidad.",".$grupo.",".$anio.",".$nombre.','.$cliente.','.$tiempo;

?>