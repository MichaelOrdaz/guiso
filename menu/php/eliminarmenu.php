<?php

include '../../db/conexion.php';

$idmenu=$_POST['idMenu'];

$sql="DELETE FROM menu WHERE idMenu = '$idmenu' ";
mysqli_query($conexion,$sql);

$sql1="DELETE FROM menurec WHERE idMenu = '$idmenu' ";
mysqli_query($conexion,$sql1);

?>