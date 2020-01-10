<?php

include '../../db/conexion.php';

$semana="";

$semana=$_POST['semana'];
$date = new DateTime($semana);
$week = $date->format("W");
$year = date("Y", strtotime($semana)); 
$month = date("m",strtotime($semana));

if(($week==1)&&($month==12)){
function Start_End_Date_of_a_week($week, $year)
{
    $time = strtotime("1 January $year", time());
	$day = date('w', $time);
	$time += ((7*$week)+1-$day)*24*3600;
	$dates[0] = date('Y-n-j', $time);
	$time += 6*24*3600;
	$dates[1] = date('Y-n-j', $time);
	return $dates;
}
$result = Start_End_Date_of_a_week(0,$year+1);
echo $result[0].' - '.$result[1];
}

else{
$dto = new DateTime();
$ret['week_start'] = $dto->setISODate($year,$week)->format('Y-m-d');
$ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
echo $week.','.$ret['week_start'].' - '.$ret['week_end'].','.$year;
}

?>