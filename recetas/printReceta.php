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

$idReceta = $_REQUEST['idReceta'];

$r = $db->query("SELECT *, 
  (SELECT descripcion FROM base WHERE idBase = base) AS asBase, 
  (SELECT descripcion FROM tiempo WHERE idTiempo = tiempo) AS asTiempo
  FROM receta WHERE 1 AND idReceta = '{$idReceta}' AND activo = 1 LIMIT 1");

empty( $db->error ) or die( 'Error obteniendo receta' );
$receta = $r->fetch_object();

$r = $db->query("SELECT * FROM recetaart AS reat LEFT JOIN articulo AS ar ON ar.idArticulo=reat.articulo WHERE reat.receta = '{$idReceta}'");
empty( $db->error ) or die( 'Error obteniendo articulos' );
$articulos = [];
while( $articulos[] = $r->fetch_object() );
array_pop($articulos);

//ya tengo articulos y tengo receta

//instanciamos el objeto 
$spreadsheet = new Spreadsheet();
//obtejemos la hoja de calculo activa
$sheet = $spreadsheet->getActiveSheet();

$indexRow = 1;
//titulo
$sheet->mergeCells("A{$indexRow}:F{$indexRow}");
$sheet->setCellValue("A{$indexRow}", "GUISOPAK");
$sheet->getStyle("A{$indexRow}")->getFont()->setBold(true)->setSize(14);
$sheet->getStyle("A{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$indexRow++;
//receta nombre
$sheet->mergeCells("A{$indexRow}:F{$indexRow}");
$sheet->setCellValue("A{$indexRow}", "Receta de: " . $receta->nombre);
$sheet->getStyle("A{$indexRow}")->getFont()->setBold(true)->setSize(14);
$sheet->getStyle("A{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle("A{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EE7561');

//porciones
$indexRow++;
$sheet->setCellValue("A{$indexRow}", "Porciones:");//porcion
$sheet->setCellValue("B{$indexRow}", $receta->porciones);//porcion

// $indexRow++;
$sheet->setCellValue("C{$indexRow}", "Costo/Unidad:");//porcion
$sheet->setCellValue("D{$indexRow}", $receta->costo);//porcion

$sheet->setCellValue("E{$indexRow}", "Costo Total:");//porcion
$sheet->setCellValue("F{$indexRow}", number_format( $receta->costo * $receta->porciones, 2, '.', '' ) );//porcion

$indexRow++;
$sheet->setCellValue("A{$indexRow}", "Tiempo:" );
$sheet->setCellValue("B{$indexRow}", $receta->asTiempo );

// $indexRow++;
$sheet->setCellValue("C{$indexRow}", "Base:" );
$sheet->setCellValue("D{$indexRow}", $receta->asBase );

// $indexRow++;
// $sheet->setCellValue("C{$indexRow}", "Grupo:" );
// $sheet->setCellValue("D{$indexRow}", $receta->asGrupo );

$indexRow += 2;
$indexHeader = $indexRow;

$titulos = ['A'=> 'ID Artículo', 'B'=> 'Artículo', 'C'=> 'Unidad', 'D'=> 'Cantidad', 'E'=> 'Costo Unitario', 'F'=> 'Costo Total'];
$sheet->getStyle("A{$indexRow}:F{$indexRow}")->getFont()->setBold(true);
$sheet->getStyle("A{$indexRow}:F{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FF64');

foreach ($titulos as $key => $title){
  $sheet->getColumnDimension($key)->setAutoSize(true);
  $sheet->setCellValue("{$key}{$indexRow}", " $title");
}


$costoTotal = 0;
$indexRow++;
foreach ($articulos as $row){

  $costoArticulo = number_format( ( $row->costo * $row->cantidad ), 2, '.', '' );
  $costoTotal += (float) $costoArticulo;

  $sheet->setCellValue("A{$indexRow}", $row->idArticulo);
  $sheet->setCellValue("B{$indexRow}", $row->nombre);
  $sheet->setCellValue("C{$indexRow}", $row->medida);
  $sheet->setCellValue("D{$indexRow}", $row->cantidad);
  $sheet->setCellValue("E{$indexRow}", $row->costo);
  // $sheet->setCellValue("E{$indexRow}", $row->costo);
  // $sheet->setCellValue("F{$indexRow}", $costoArticulo );
  $sheet->setCellValue("F{$indexRow}", "=D{$indexRow}*E{$indexRow}");
  $sheet->getCell("F{$indexRow}")->getCalculatedValue();//ejecuta la formula

  $indexRow++;

}

$endRowForeach = ($indexRow - 1);//la ultima fila donde se dibujaron textos

$sheet->setCellValue("E{$indexRow}", "Total" );
// $sheet->setCellValue("F{$indexRow}", number_format( $costoTotal, 2, '.', '' ) );
$cell = "F".( $indexHeader + 1 ).":F".($endRowForeach);
$sheet->setCellValue("F{$indexRow}", "=SUM({$cell})" );
$sheet->getCell("F{$indexRow}")->getCalculatedValue();//ejecuta la formula

// //set autoFilter de un rango
$sheet->setAutoFilter("A{$indexHeader}:F{$endRowForeach}");


header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-disposition: attachment; filename=Receta {$receta->nombre}.xlsx");
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');