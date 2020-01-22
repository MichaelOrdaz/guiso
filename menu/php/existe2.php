<?php

include '../../db/conexion.php';

$receta=$_POST['receta'];

$consul ="SELECT nombre FROM receta WHERE nombre = 'CAFE NEGRO' ";
$result = mysqli_query($conexion,$consul);
mysqli_num_rows($result);

if(mysqli_num_rows($result)>0){
$temp=1;
}else{
$temp=0;
}

echo $temp;

?>