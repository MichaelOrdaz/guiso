<?php

include '../../db/conexion.php';

$bandera=0;

$idMenu=$_POST['idMenu'];
$lunes=$_POST['lunes'];
$martes=$_POST['martes'];
$miercoles=$_POST['miercoles'];
$jueves=$_POST['jueves'];
$viernes=$_POST['viernes'];
$sabado=$_POST['sabado'];
$domingo=$_POST['domingo'];

$tiempo=$_POST['tiempo'];
$costot=floatval($_POST['costot']);

$temporal= explode("_",$idMenu);
$idm = str_replace($temporal[0],date("Y"),$idMenu);

$fecha=$_POST['fecha'];
$anio=date("Y", strtotime($fecha));

$receta = array();
$cont1=0;
$data1 = json_decode(stripslashes($_POST['receta']));
foreach($data1 as $r){
$receta[$cont1++]=$r;
}

$costo = array();
$cont2=0;
$data2 = json_decode(stripslashes($_POST['costo']));
foreach($data2 as $r){
$costo[$cont2++]=$r;
}

$personas = array();
$cont3=0;
$data3 = json_decode(stripslashes($_POST['personas']));
foreach($data3 as $f){
$personas[$cont3++]=$f;
}

$fechas = array();
$cont4=0;
$data4 = json_decode(stripslashes($_POST['fechas']));
foreach($data4 as $f){
$fechas[$cont4++]=$f;
}

$receta = explode(",",$receta[0]);
$fechas = explode(",",$fechas[0]);
$personas = explode(",",$personas[0]);
$costo = explode(",",$costo[0]);

for ($i=0;$i<count($receta);$i++){
if($receta[$i]!=""){
$consul ="SELECT nombre FROM receta WHERE nombre = '$receta[$i]' ";
$result = mysqli_query($conexion,$consul);
mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
}else{
$bandera=1;
}
}
}

echo $bandera;

if($bandera!=1){
$sql3="UPDATE menu SET idMenu='$idm',anio='$anio',numTiempos='$tiempo',costoTot='$costot',lunes='$lunes',martes='$martes',miercoles='$miercoles',jueves='$jueves',jueves='$jueves',
viernes='$viernes',sabado='$sabado',domingo='$domingo' WHERE idMenu='$idMenu' ";
mysqli_query($conexion,$sql3);
$sql1="DELETE FROM menurec WHERE idMenu = '$idMenu' ";
mysqli_query($conexion,$sql1);
for ($i=0;$i<count($fechas);$i++){
$consulta = "SELECT nombre,tiempo FROM receta WHERE nombre = '$receta[$i]' ";
$resultado = mysqli_query($conexion,$consulta);
$tiempo="";
while($columna=mysqli_fetch_array($resultado)){
$tiempo=$columna['tiempo'];
}
$sql2 = "INSERT INTO menurec (idMenu,pos,tiempo,receta,precio,personas,fecha) VALUES ('$idm','','$tiempo','$receta[$i]','$costo[$i]','$personas[$i]','$fechas[$i]')";
mysqli_query($conexion,$sql2);
}
}

?>
