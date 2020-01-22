<?php
session_start();
if( empty( $_SESSION['usuario_comedor'] ) ):
  echo "<h1 style='text-align:center;color: #af4040;position: absolute;top: 40%;left: 50%;transform: translate(-50%, -50%) skewX(15deg);font-size: 60px;'>Acceso denegado!!</h1>";
  http_response_code(403);
  exit;
endif;

define('KEY', 'JACE');

require '../db/db.php';

require '../db/vendor/autoload.php';
//carga l libreriia con namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//carga la clase para escribir el excel
use PhpOffice\PhpSpreadsheet\IOFactory;

$idMenu = $_REQUEST['menu'];

$r = $db->query("SELECT *, 
  (SELECT nombre FROM cliente WHERE idCliente = menu.cliente ) AS clienteName, 
  (SELECT unidad FROM unidad WHERE idUnidad = menu.unidad) AS unidadName, 
  (SELECT subunidad.subUnidad FROM subunidad WHERE idSUnidad = menu.subunidad ) AS subunidadName, 
  (SELECT descripcion FROM grupo WHERE idGrupo = menu.grupo) AS grupoName 
  FROM menu WHERE idMenu = '{$idMenu}' LIMIT 1");

empty( $db->error ) or die( 'Error obteniendo receta' );
$menu = $r->fetch_object();

$r = $db->query("SELECT *, (SELECT idReceta FROM receta WHERE nombre = menurec.receta LIMIT 1) AS idReceta FROM menurec WHERE idMenu = '{$idMenu}'");
empty( $db->error ) or die( 'Error obteniendo articulos' );

$recetas = [];
while( $recetas[] = $r->fetch_object() );
array_pop($recetas);

//ya tengo articulos y tengo receta


//instanciamos el objeto 
$spreadsheet = new Spreadsheet();
//obtejemos la hoja de calculo activa
$sheet = $spreadsheet->getActiveSheet();

$indexRow = 1;
//titulo
$sheet->mergeCells("A{$indexRow}:H{$indexRow}");
$sheet->setCellValue("A{$indexRow}", "GUISOPAK");
$sheet->getStyle("A{$indexRow}")->getFont()->setBold(true)->setSize(14);
$sheet->getStyle("A{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$indexRow++;
//receta nombre
$sheet->mergeCells("A{$indexRow}:H{$indexRow}");
$sheet->setCellValue("A{$indexRow}", "MENU SEMANAL PRESUPUESTO");
$sheet->getStyle("A{$indexRow}")->getFont()->setBold(true)->setSize(14);
$sheet->getStyle("A{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle("A{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EE7561');

//porciones
$indexRow++;
$sheet->setCellValue("A{$indexRow}", "Semana No.");//porcion
$sheet->setCellValue("B{$indexRow}", $menu->semana . ' - ' . $menu->anio);//porcion

// $indexRow++;
$sheet->setCellValue("C{$indexRow}", "Grupo: ");//porcion
$sheet->setCellValue("D{$indexRow}", $menu->grupoName);//porcion
$sheet->getStyle("C{$indexRow}:D{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B0C2EA');

$indexRow++;
$sheet->setCellValue("A{$indexRow}", "Cliente:" );
$sheet->setCellValue("B{$indexRow}", $menu->clienteName );
$sheet->getStyle("B{$indexRow}")->getAlignment()->setWrapText(true);

// $indexRow++;
$sheet->setCellValue("C{$indexRow}", "Unidad:" );
$sheet->setCellValue("D{$indexRow}", $menu->unidadName );
$sheet->getStyle("D{$indexRow}")->getAlignment()->setWrapText(true);

$sheet->setCellValue("E{$indexRow}", "Subunidad:" );
$sheet->setCellValue("F{$indexRow}", $menu->subunidadName );
$sheet->getStyle("F{$indexRow}")->getAlignment()->setWrapText(true);


$indexRow += 2;
$indexHeader = $indexRow;

$titulos = ['A'=> 'Tiempo', 'B'=> 'Lunes', 'C'=> 'Martes', 'D'=> 'Miercoles', 'E'=> 'Jueves', 'F'=> 'Viernes', 'G'=> 'Sabado', 'H'=> 'Domingo'];
$sheet->getStyle("A{$indexRow}:H{$indexRow}")->getFont()->setBold(true);
$sheet->getStyle("A{$indexRow}:H{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FF64');

foreach ($titulos as $key => $title){
  $sheet->getColumnDimension($key)->setWidth(20);
  $sheet->setCellValue("{$key}{$indexRow}", " $title");
}

//quiero agrupar el array por valores
$estructurar = [];
foreach ($recetas as $receta){
  $estructurar[$receta->tiempo][] = $receta;
}

$indexRow++;//siguiente fila
$listDias = ['', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

foreach ($estructurar as $key => $item) {

  $tiempoName = $db->query("SELECT descripcion FROM tiempo WHERE idTiempo = '{$key}' LIMIT 1");
  $tiempoName = $db->affected_rows > 0 ? $tiempoName->fetch_object()->descripcion : 'Desconocido';

  $secondRow = $indexRow + 1;//guardar la suigiente fila para este tiempo

  //aqui tengo que hacer un merge de las 2 filas de la primera columna
  $sheet->mergeCells("A{$indexRow}:A{$secondRow}");
  $sheet->setCellValue("A{$indexRow}", $tiempoName);

  //aqui pongo las recetas
  
  foreach ($item as $receta) {
    
    //necesito saber en que columna voy a poner esta receta
    //en receta tengo, pos, receta, precio, personas, idReceta
    
    //pos es mi dia osea, 
    //1 = lunes
    //2 = martes
    //3 = miercoles, etc
    
    $dia = $listDias[(int) $receta->pos];

    $column = array_search( ucfirst($dia), $titulos);

    $sheet->setCellValue("{$column}{$indexRow}", $receta->idReceta . ' - ' . $receta->receta);
    $sheet->getStyle("{$column}{$indexRow}")->getAlignment()->setWrapText(true);

    $sheet->setCellValue("{$column}{$secondRow}", number_format($receta->personas * $receta->precio, 2, '.', '') . ' / ' . $receta->personas);

  }
  //aqui terminan las recetas
  //al final de poner las recetas le sumamos a indexrow 2 columnas
  $indexRow += 2;

}

header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-disposition: attachment; filename=Menu {$idMenu} {$menu->clienteName}.xlsx");
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
