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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$orden = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) or die(toJson(0, 'La orden es inválida'));

$sql = "SELECT cliente, (SELECT nombre FROM cliente WHERE idCliente = oc.cliente) AS clienteName, fechaI, fechaF FROM oc WHERE idOC = '{$orden}' LIMIT 1";
// echo $sql;
$r = $db->query($sql);
$db->affected_rows > 0 or die( toJson(0, 'Hubo un error al generar el reporte, por favor reintente elaborando otra OC') );

$r = $r->fetch_object();
$client = $r->cliente;
$clienteName = $r->clienteName;
$dt = new DateTime($r->fechaI);
$start = $dt->format('Y-m-d');
$sem1 = $dt->format('W');
$dt = new DateTime($r->fechaF);
$end = $dt->format('Y-m-d');
$sem2 = $dt->format('W');

$semana = $sem1 === $sem2 ? $sem1 : "$sem1 - $sem2";

$sql = "SELECT unidad, articulo, SUM(cantidad) as cantidad, proveedor, presentacion, factor, costoU, costoT, (SELECT pago FROM proveedor WHERE idProveedor = bomoc.proveedor) AS pago, (SELECT nombre FROM proveedor WHERE idProveedor = bomoc.proveedor) AS provName FROM bomoc WHERE OC = '{$orden}' GROUP BY articulo, proveedor, unidad ORDER BY proveedor, pago";

$r = $db->query($sql);

$db->affected_rows > 0 or die( toJson(0, 'Hubo un error al generar el reporte, por favor reintente') );

//aqui agrupo por proveedor y tambien deberia agrupar por unidad
$costosProveedores = [];
$uniqueUnidades = [];

while( $item = $r->fetch_object() ){

    //sacamos el excedente
    $sql = "SELECT cantidad FROM excedente WHERE articulo = '{$item->articulo}' AND unidad = '{$item->unidad}' LIMIT 1";
    $exd = $db->query($sql);
    $exd = $db->affected_rows > 0 ? $exd->fetch_object()->cantidad : 0;

    $cantidad = $item->cantidad - $exd;
    $costoT = $item->costoU * $cantidad;

    if( $costoT < 0 ) $costoT = 0;//si el costo es negativo lo igualamos a 0

    $cantidad = number_format($cantidad, 3, '.', '');

    $sql = "SELECT unidad FROM unidad WHERE idUnidad = '{$item->unidad}' LIMIT 1";
    $uni = $db->query($sql);
    $uni = $db->affected_rows > 0 ? $uni->fetch_object()->unidad : 'DESCONOCIDA';

    if( array_key_exists($item->pago, $costosProveedores ) ){
      if( array_key_exists($item->proveedor, $costosProveedores[$item->pago] ) ){
        if( array_key_exists($item->unidad, $costosProveedores[$item->pago][$item->proveedor] ) ){
          $costosProveedores[$item->pago][$item->proveedor][$item->unidad]->costoTotal += $costoT;
        }
        else{
          $aux = new stdClass;
          $aux->costoTotal = $costoT;
          $aux->unidad = $item->unidad;
          $aux->proveedor = $item->proveedor;
          $aux->pago = $item->pago;
          $aux->unidadName = $uni;
          $aux->provName = $item->provName;

          $costosProveedores[$item->pago][$item->proveedor][$item->unidad] = $aux;

        }
      }
      else{
        $aux = new stdClass;
        $aux->costoTotal = $costoT;
        $aux->unidad = $item->unidad;
        $aux->proveedor = $item->proveedor;
        $aux->pago = $item->pago;
        $aux->unidadName = $uni;
        $aux->provName = $item->provName;

        $costosProveedores[$item->pago][$item->proveedor][$item->unidad] = $aux;
      }
    }
    else{
      $aux = new stdClass;
      $aux->costoTotal = $costoT;
      $aux->unidad = $item->unidad;
      $aux->proveedor = $item->proveedor;
      $aux->pago = $item->pago;
      $aux->unidadName = $uni;
      $aux->provName = $item->provName;

      $costosProveedores[$item->pago][$item->proveedor][$item->unidad] = $aux;
    }

    // if( array_key_exists($item->proveedor, $uniqueUnidades) === FALSE ){
      $uniqueUnidades[$item->unidad] = ['id'=> $item->unidad, 'name'=> $uni];
    // }

}

  //cuantas columnas hare lo hare con la cantidad de unidade que existan
  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();//recuperamos esa hoja activa

  $indexRow = 1;

  //header
  $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
  $drawing->setName('Logo');
  $drawing->setDescription('Logo');
  $drawing->setPath('../img/logo_guisopak.png');
  $drawing->setHeight(55);
  $drawing->setCoordinates('A1');
  
  $sheet->mergeCells("A1:A2");
  //add logo
  $drawing->setWorksheet($sheet);

  //comenzamos las unidades en B
  $columns = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

  $sizeUnidades = count($uniqueUnidades) + 1;//el mas uno, es de mi ultima columna que sera total
  $columnsUnidades = [];
  for( $i=0; $i < $sizeUnidades && $i < 24; $i++ ){
    $columnsUnidades[] = $columns[$i];
  }

  $columnsSheet = array_merge( ['A'], $columnsUnidades );
  $titles = ['A'=> 'Proveedor'];
  $j = 0;
  foreach ($uniqueUnidades as $unidad) {
    $titles[ $columnsUnidades[$j] ] = $unidad['name'];
    $j++;
  }
  $titles[ end($columnsUnidades) ] = 'Total';

  $endLetter = end($columnsSheet);//la ultima letra de mi array assoc

  // //titulo
  $sheet->mergeCells("B{$indexRow}:{$endLetter}{$indexRow}");
  $sheet->setCellValue("B{$indexRow}", "GUISOPAK");
  $sheet->getStyle("B{$indexRow}")->getFont()->setBold(true)->setSize(14);
  $sheet->getStyle("B{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

  $indexRow++;
 
  $sheet->mergeCells("B{$indexRow}:{$endLetter}{$indexRow}");
  $sheet->setCellValue("B{$indexRow}", "Presupuesto de Compras");
  $sheet->getStyle("B{$indexRow}")->getFont()->setBold(true)->setSize(14);
  $sheet->getStyle("B{$indexRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
  $sheet->getStyle("B{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EE7561');

  // //cliente
  $indexRow++;
  $sheet->setCellValue("A{$indexRow}", "Orden:");//semana
  $sheet->mergeCells("B{$indexRow}:C{$indexRow}");
  $sheet->setCellValue("B{$indexRow}", $orden);//semana

  $indexRow++;
  $sheet->setCellValue("A{$indexRow}", "Semana:");//semana
  $sheet->setCellValue("B{$indexRow}", $semana);//semana

  $indexRow++;
  $sheet->setCellValue("A{$indexRow}", "Fecha:");//semana
  $sheet->setCellValue("B{$indexRow}", "$start - $end");//semana

  $indexRow++;
  $sheet->setCellValue("A{$indexRow}", "Cliente:");
  $sheet->setCellValue("B{$indexRow}", $clienteName);

  // //unidades
  $indexRow++;
  $sheet->setCellValue("A{$indexRow}", "Unidades:");
  $sheet->mergeCells("B{$indexRow}:{$endLetter}{$indexRow}");
  $sheet->setCellValue("B{$indexRow}", implode(', ', array_column($uniqueUnidades, 'name' ) ) );
  $sheet->getStyle("B{$indexRow}")->getAlignment()->setWrapText(true);

  $indexRow++;
  $three = $indexRow + 2;
  $sheet->mergeCells("A{$indexRow}:{$endLetter}{$three}");
  $sheet->setCellValue("A{$indexRow}", 'Especificaciones: El resultado puede variar debido en que el rubro de Carnes y Salchichonería varian los kilos en cuanto a lo facturado');
  $sheet->getStyle("A{$indexRow}")->getAlignment()->setWrapText(true);

  $indexRow += 4;

  $sheet->getStyle("A{$indexRow}:{$endLetter}{$indexRow}")->getFont()->setBold(true);
  $sheet->getStyle("A{$indexRow}:{$endLetter}{$indexRow}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FF64');

  foreach ($titles as $key => $title){
    if( $key === 'A' )
      $sheet->getColumnDimension($key)->setWidth(40);
    else
      $sheet->getColumnDimension($key)->setWidth(18);

    $sheet->setCellValue("{$key}{$indexRow}", "$title");
  }

  $sheet->getStyle("A{$indexRow}:{$endLetter}{$indexRow}")->getAlignment()->setWrapText(true);
  $indexRow++;



  //$columnsSheet 
  //tienes las coordenas de la unidad

  // var_dump($titles);
  // var_dump($costosProveedores);

  // exit;

  foreach ($costosProveedores as $pago => $proveedores) {
    // echo "Tipo de Pago: $pago <br>";

    $beginRowProv = null;
    foreach ($proveedores as $proveedor => $unidades) {
      // echo "Al proveedor $proveedor <br>";
      
      if( is_null($beginRowProv) ) $beginRowProv = $indexRow;

      $pn = $db->query("SELECT nombre FROM proveedor WHERE idProveedor = '{$proveedor}' LIMIT 1");
      $provName = $db->affected_rows > 0 ? $pn->fetch_object()->nombre : 'Sin Proveedor';
      $sheet->setCellValue("A{$indexRow}", $provName);
      $sheet->getStyle("A{$indexRow}")->getAlignment()->setWrapText(true);

      foreach ($unidades as $unidad => $costo) {  
        // echo "La unidad $unidad le comprara $costo->costoTotal <br><br>";
        //ahora aqui buscamos la unidad en sheet columns
        
        $column = array_search($costo->unidadName, $titles);
        $sheet->setCellValue("{$column}{$indexRow}", number_format( $costo->costoTotal, 2, '.', '' ) );
      

      }

      //aqui termino de poner todo lo de este proveedor
      //entonces sumamos horizontalmente
      //para ello debo saber que siempre empiezo en B y termino en X lugar
      
      //necesito recuperar la llave de total
      $lastCol = array_search('Total', $titles);

      $a = ord($lastCol);//convertimos a su numero ascii la letra
      $last = chr(--$a);//le restamos uno y lo convertimos a caracter otra vez
      //colocamos la formula para sumar
      $sheet->setCellValue("{$lastCol}{$indexRow}", "=SUM(B{$indexRow}:{$last}{$indexRow})" );
      $indexRow++;
    }

    $sheet->setCellValue("A{$indexRow}", "*** {$pago} ***");
    //aqui sumamos horizontalmente
    // con ayuda de titles ya que esa posee las columnas que debo sumar
    foreach ($titles as $letra => $title){
      if( in_array($title, ['Proveedor'] ) ) continue;
      $prevRow = $indexRow - 1;
      $sheet->setCellValue("{$letra}{$indexRow}", "=SUM({$letra}{$beginRowProv}:{$letra}{$prevRow})" );
    }
    
    $indexRow++;

  }







  header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header("Content-disposition: attachment; filename=Presupuesto $orden.xlsx");
  header('Cache-Control: max-age=0');

  $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
  $writer->save('php://output');




/*
echo "<pre>";
var_dump($costosProveedores);
var_dump($uniqueUnidades);


foreach ($costosProveedores as $pago => $proveedores) {
  echo "Tipo de Pago: $pago <br>";

  foreach ($proveedores as $proveedor => $unidades) {
    echo "Al proveedor $proveedor <br>";

    foreach ($unidades as $unidad => $costo) {
      echo "La unidad $unidad le comprara $costo->costoTotal <br><br>";
    }

  }

}
*/


exit;


//por cada proveedor hace una hoja

//articulosVendidos ya esta agrupados por proveedores
//cada proveedor es una hoja de excel

// instanciamos el objeto 
$spreadsheet = new Spreadsheet();
$hoja = 0;

// echo "<pre>";
// var_dump($articulosVendidos);
$itemsToExcel = [];

foreach ($articulosVendidos as $key => $proveedor) {

  //cada proveedor genera una hojas de excel

  if( $hoja !== 0 )
    $spreadsheet->createSheet();//crea una nueva hoja de calculo

  //establecemos la hoja de calculo activa
  $spreadsheet->setActiveSheetIndex( $hoja );
  $sheet = $spreadsheet->getActiveSheet();//recuperamos esa hoja activa
  $hoja++;

  $indexRow = 1;

  // //seleccionamos el nombre del proveedor
  $r = $db->query("SELECT nombre FROM proveedor WHERE idProveedor = '{$key}' LIMIT 1");
  $proveedorName = $db->affected_rows > 0 ? $r->fetch_object()->nombre : 'OTROS';

  // var_dump($key, $proveedorName);
  $metaData = new stdClass();
  $metaData->proveedorId = $key;
  $metaData->proveedorName = $proveedorName;
  $metaData->clienteName = $nameClient;
  $metaData->unidades = $unidades;
  $metaData->clienteId = $client;

  $columnsSheet = headerExcel($metaData, $indexRow);

  //esta contiene
  // ['A'=> 'articulo', 'B'=> 'presentacion', 'C'=> 'precio', 'D'=> 'unidadName', 'E'=> 'unidadName', 'N'=> 'unidadanameN'...., 'N + 1'=> 'total'];

  $itemsToDraw = [];
  foreach ($proveedor as $unidadesProveedor) {    
 
    //entonces diria que del proveedor uno tengo un array de las unidades a las que le surtio y en esas unodades tengo el articulo, ya acumulado sus cantidades

    //entonces tengo que hacer otro array, con costos de cada unidad por articulo//DESCARTADO

    foreach ($unidadesProveedor as $articulo) {
      
      //sobre cada articulo calculamos su costo

      // ["idReceta"]=> string(5) "08001" 
      // ["porciones"]=> string(3) "100" 
      // ["cantidad"]=> float(4.5) 
      // ["idArticulo"]=> string(4) "5056" 
      // ["nombre"]=> string(14) "Canela en rama" 
      // ["linea"]=> string(1) "5" 
      // ["artUnidad"]=> string(10) "KILOGRAMOS" 
      // ["unidadA"]=> string(0) "" 
      // ["costo"]=> string(3) "141" 
      // ["factor"]=> string(1) "0" 
      // ["unidad"]=> string(2) "01" 
      // ["unidadName"]=> string(15) "CERESO TLAXCALA" 
      // ["proveedorId"]=> string(3) "128" 
      // ["costoT"]=> float(239.7) 
      // ["cantidadCalc"]=> float(1.7) 
      // ["personas"]=> string(3) "340" 
      
      $sql = "SELECT cantidad FROM excedente WHERE articulo = '{$articulo->articulo}' AND unidad = '{$articulo->unidad}' LIMIT 1";
      $exd = $db->query($sql);
      $exd = $db->affected_rows > 0 ? $exd->fetch_object()->cantidad : 0;

      $cantidad = $articulo->cantidadCalc - $exd;
      $costoT = $articulo->costoU * $cantidad;

      if( $costoT < 0 ) $costoT = 0;//si el costo es negativo lo igualamos a 0

      //ESTA ES LA DIFERENCIA qUE ENCUENTRO EN OC con PRESENTACION

      if( $articulo->factor != 0 ){
        $cantidad = ( $cantidad / $articulo->factor );
        $articulo->costoU *= $articulo->factor;
      }
      //tengo que poner en el excel
      //articulo nombre, presentacion, precio, unidadN....., total(suma de unidades)

      //debo verificar que si existe el articulo, entonces ahora buscamos si existe la unidad, y si existe la unidad acumulamos los valores
      //si no existe la unidad agregamos ese valor y esa unidad
      if( array_key_exists($articulo->articulo, $itemsToDraw) ){

        if( array_key_exists( $articulo->unidadName, $itemsToDraw[$articulo->articulo] ) ){
          //si existe esa unidad en el array asocc acumulamos valores
          $itemsToDraw[$articulo->articulo][$articulo->unidadName] += $cantidad;
        }
        else{
          //si no existe esa unodad en el articulo lo agregamos
          $itemsToDraw[$articulo->articulo][$articulo->unidadName] = $cantidad;
        }

      }
      else{
        $art = [];
        $art['articulo'] = $articulo->nombre;

        //TAMBIEN AQUI ESTA ALGO DIFENTE EN PRESENTACION
        $artUnidad = $db->query("SELECT unidad FROM articulo WHERE idArticulo = '{$articulo->articulo}' LIMIT 1");
        $articulo->artUnidad = $db->affected_rows > 0 ? $artUnidad->fetch_object()->unidad : 'OTROS'; 

        if( $articulo->factor == 0 )
          $art['presentacion'] = $articulo->artUnidad;
        else
          $art['presentacion'] = "$articulo->presentacion de $articulo->factor $articulo->artUnidad";

        $art['precio'] = $articulo->costoU;
        // $art['factor'] = $articulo->costo;

        $art[$articulo->unidadName] = $cantidad;
        
        $itemsToDraw[$articulo->articulo] = $art;
      
      }

    }

  }

  // var_dump($itemsToDraw);
  ///ya cree las filas de cada articulo y las sumatorias de las unidades entonces una vez que tengo solo me falta dibujarlo, que ya es lo mas facil

  foreach ($itemsToDraw as $key2 => $value){

    //value es esto, un array asociativo
    // array(6) {
    //   ["articulo"]=>
    //   string(21) "Tortilla de maiz INDT"
    //   ["presentacion"]=>
    //   string(0) ""
    //   ["precio"]=>
    //   string(3) "8.5"
    //   ["CERESO TLAXCALA"]=>
    //   float(76.5)
    //   ["CERESO APIZACO"]=>
    //   float(76.5)
    //   ["TUTELAR APIZACO"]=>
    //   float(76.5)
    // }

    //$columnsSheet tiene en este momento la forma
    // ['A'=> 'articulo', 'B'=> 'presentación', 'C'=> 'precio', 'D'=> 'CEREZO TLAXCALA', 'E'=> 'CEREZO APIZACO', 'F'=> 'TUTELAR TLAXCALA', 'G'=> 'total'];

    $sheet->setCellValue("A{$indexRow}", $value['articulo']);
    $sheet->setCellValue("B{$indexRow}", $value['presentacion']);
    $sheet->setCellValue("C{$indexRow}", $value['precio']);

    $last = 'Z';//por si fallara
    foreach ($columnsSheet as $AxisY => $title) {
      
      //entonces en $value busco las claves que esten en $columns, a excepcion de articulo, presenteción y precio
      if( in_array($title, ['Producto', 'Presentación', 'Precio'] ) )
        continue;
      //no hacemos nada cuando el eje y sea igual a alguno de esos ya que ya los puse arriba
     
      //pero tambien cuando title sea Total, estamos en la ultima columna entonces ahi aplicamos la formula 
      //sabemos que siempre empieza en D, y donde acaba es el problema, pero tenemos AxisY, que es la letra de la ultima columna, entonces a esa letra le restamos uno en ASCII, y otenemso la ultima letra de unidades
      if( $title === 'Total' ){

        $a = ord($AxisY);//convertimos a su numero ascii
        $last = chr(--$a);//le restamos uno y lo convertimos a caracter otra vez
        //colocamos la formula para sumar
        $sheet->setCellValue("{$AxisY}{$indexRow}", "=SUM(D{$indexRow}:{$last}{$indexRow})*C{$indexRow}" );
        continue;

      }

      //pero cuando sean diferentes, debo rescatar ese ejey y buscarlo en value
      $sheet->setCellValue("{$AxisY}{$indexRow}", empty($value[$title]) ? '' : $value[$title] );

    }
  
    $sheet->getStyle("A{$indexRow}:{$last}{$indexRow}")->getAlignment()->setWrapText(true);

    $indexRow++;

  }


}

header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-disposition: attachment; filename=OC $orden con Presentacion $start - $end.xlsx");
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

