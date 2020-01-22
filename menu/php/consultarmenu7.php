<?php 

include '../../db/conexion.php';

$idMenu=$_POST['idMenu'];

$consulta = "SELECT lunes,martes,miercoles,jueves,viernes,sabado,domingo FROM menu WHERE idMenu='$idMenu' ";
$resultado = mysqli_query($conexion,$consulta);
while($columna=mysqli_fetch_array($resultado)){
$lunes=$columna['lunes'];
$martes=$columna['martes'];
$miercoles=$columna['miercoles'];
$jueves=$columna['jueves'];
$viernes=$columna['viernes'];
$sabado=$columna['sabado'];
$domingo=$columna['domingo'];
}

echo $lunes.",".$martes.",".$miercoles.",".$jueves.",".$viernes.",".$sabado.",".$domingo;

?>