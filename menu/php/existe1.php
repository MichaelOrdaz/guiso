<?php

include '../../db/conexion.php';

$idMenu=$_POST['idMenu'];

$consul ="SELECT idMenu FROM menu WHERE idMenu = '$idMenu' ";
$result = mysqli_query($conexion,$consul);
mysqli_num_rows($result);

if(mysqli_num_rows($result)>0){
$temp=1;
}else{
$temp=0;
}

echo $temp;

?>