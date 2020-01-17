<?php

include '../../db/conexion.php';

$idMenu=$_POST['idMenu'];
$anio=$_POST['anio'];
$semana=$_POST['semana'];
$cliente=$_POST['cliente'];
$unidad=$_POST['unidad'];
$subunidad=$_POST['subunidad'];
$grupo=$_POST['grupo'];
$tiempo=$_POST['tiempo'];
$recetas=$_POST['recetas'];
$precio=$_POST['precio'];
$personas=$_POST['personas'];
$costo=$_POST['costo'];
$elaboro=$_POST['elaboro'];
$fechas=$_POST['fechas'];

$lunes=$_POST['lunes'];
$martes=$_POST['martes'];
$miercoles=$_POST['miercoles'];
$jueves=$_POST['jueves'];
$viernes=$_POST['viernes'];
$sabado=$_POST['sabado'];
$domingo=$_POST['domingo'];

$idMenu=$anio."_".$semana."_".$cliente."_".$unidad."_".$subunidad."_".$grupo;

$dto = new DateTime();
$ret['week_start'] = $dto->setISODate($anio,$semana)->format('Y-m-d');
$ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
$lapso=$ret['week_start'].' - '.$ret['week_end'];

$sql = "INSERT INTO menu (idMenu,anio,semana,lapso,numTiempos,cliente,unidad,subunidad,costoTot,elaboro,grupo,lunes,martes,miercoles,jueves,viernes,sabado,domingo,status,fecha,activo) VALUES 
						 ('$idMenu','$anio','$semana','$lapso','$tiempo','$cliente','$unidad','$subunidad','$costo','$elaboro','$grupo','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado',
						 '$domingo',1,now(),1)";

mysqli_query($conexion,$sql);

$fechas = explode(",",$fechas);
$recetas = explode(",",$recetas);
$personas = explode(",",$personas);
$precio = explode(",",$precio);

for ($i=0;$i<count($fechas);$i++){

$consulta = "SELECT nombre,tiempo FROM receta WHERE nombre = '$recetas[$i]' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$nombre=$columna['nombre'];
$tiempo=$columna['tiempo'];
}

$sql1 = "INSERT INTO menurec (idMenu,pos,tiempo,receta,precio,personas,fecha) VALUES ('$idMenu','','$tiempo','$nombre','$precio[$i]','$cantidad[$i]','$fechas[$i]')";
mysqli_query($conexion,$sql1);

}

?>