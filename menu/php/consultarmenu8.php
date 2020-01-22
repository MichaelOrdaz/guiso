<?php 

error_reporting(0);

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

$consulta = "SELECT anio,semana,numTiempos,costoTot,elaboro,unidad,subUnidad,grupo,cliente FROM menu WHERE idMenu='$idMenu' ";
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
}

$consulta = "SELECT unidad FROM unidad WHERE idUnidad='$unidad' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$unidad=$columna['unidad'];
}

$consulta = "SELECT subUnidad FROM subunidad WHERE idSUnidad='$subunidad' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$subunidad1=$columna['subUnidad'];
}

$consulta = "SELECT descripcion FROM grupo WHERE idGrupo='$grupo' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$grupo=$columna['descripcion'];
}

$consulta = "SELECT nombre FROM cliente WHERE idCliente='$cliente' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$nombre=$columna['nombre'];
}

echo $semana.",".$tiempo.",".$costoTot.",".$elaboro.",".$unidad.",".$subunidad1.",".$grupo.",".$anio.",".$nombre.",".$subunidad;

?>