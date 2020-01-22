<?php

include '../../db/conexion.php';

$idMenu=$_POST['idMenu'];
$lunes=$_POST['lunes'];
$martes=$_POST['martes'];
$miercoles=$_POST['miercoles'];
$jueves=$_POST['jueves'];
$viernes=$_POST['viernes'];
$sabado=$_POST['sabado'];
$domingo=$_POST['domingo'];

$elaboro=$_POST['elaboro'];
$costoTot=$_POST['costot'];
$tiempo=$_POST['tiempo'];

$temporal= explode("_",$idMenu);
$anio=$temporal[0];
$semana=$temporal[1];
$cliente=$temporal[2];
$unidad=$temporal[3];
$subunidad=$temporal[4];
$grupo=$temporal[5];

$sql2 = "INSERT INTO menu (anio,idMenu,semana,cliente,unidad,subunidad,grupo,elaboro,numTiempos,costoTot,lunes,martes,miercoles,jueves,viernes,sabado,domingo,status,fecha,activo) VALUES 
('$anio','$idMenu','$semana','$cliente','$unidad','$subunidad','$grupo','$elaboro','$tiempo','$costoTot','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo',1,now(),1)";
mysqli_query($conexion,$sql2);

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
for ($i=0;$i<count($fechas);$i++){
$tiempo="";
$consulta = "SELECT nombre,tiempo FROM receta WHERE nombre = '$receta[$i]' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$tiempo=$columna['tiempo'];
}
$sql2 = "INSERT INTO menurec (idMenu,pos,tiempo,receta,precio,personas,fecha) VALUES ('$idMenu','','$tiempo','$receta[$i]','$costo[$i]','$personas[$i]','$fechas[$i]')";
mysqli_query($conexion,$sql2);
}
}

?>