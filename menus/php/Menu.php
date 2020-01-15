<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Menu{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }


  public function addMenu(){
    
    $cliente = filter_input(INPUT_POST, 'cliente', FILTER_VALIDATE_INT) or die( toJson(0, 'El Cliente es desconocido o invalido') );
    $unidad = filter_input(INPUT_POST, 'unidad', FILTER_VALIDATE_INT) or die( toJson(0, 'La unidad es desconocida o invalida') );
    $subunidad = filter_input(INPUT_POST, 'subunidad', FILTER_VALIDATE_INT) or die( toJson(0, 'La subunidad es desconocida o invalida') );

    $tiempos = filter_input(INPUT_POST, 'tiempos', FILTER_VALIDATE_INT) or die( toJson(0, 'El No. de tiempos es desconocido o invalido') );
    $semana = filter_input(INPUT_POST, 'semana', FILTER_VALIDATE_INT) or die( toJson(0, 'La semana es desconocida o invalida') );
    $rango = filter_input(INPUT_POST, 'rango', FILTER_SANITIZE_STRING) or die( toJson(0, 'La semana es desconocida o invalida') );

    $grupo = filter_input(INPUT_POST, 'grupo', FILTER_VALIDATE_INT) or die( toJson(0, 'El grupo es desconocido o invalido') );

    $elaboro = filter_input(INPUT_POST, 'elaboro', FILTER_SANITIZE_STRING) or die( toJson(0, 'El elaboro es desconocido o invalido') );

    $costo = filter_input(INPUT_POST, 'costo', FILTER_VALIDATE_FLOAT) or die( toJson(0, 'El costo es desconocido o invalido') );

    // $costo = filter_input(INPUT_POST, 'costo', FILTER_VALIDATE_INT) or die( toJson(0, 'El costo es desconocido o invalido') );

    //guardar en base de datos los dias checkeados
    $listaDias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
    foreach ($listaDias as $key => $value) {
      $$value = 0;//cramos lunes martes miercoles etc en 0
      if( in_array( ( $key + 1 ), $_POST['dias'] ) ) $$value = 1;
    }

    //de rango saco el año
    $anio = substr($rango, 0, 4);

    //se compruewba que el menu no exista
    $sql = "SELECT idMenu FROM menu WHERE semana = '{$semana}' AND cliente = '{$cliente}' AND unidad = '{$unidad}' AND subUnidad = '{$subunidad}' AND grupo = '{$grupo}' AND anio = '{$anio}'";
    $this->db->query( $sql );

    $this->db->affected_rows === 0 or die( toJson(0, 'El menú para esta semana, cliente, unidad, sub-unidad y grupo (servicio) ya existe') );

    $idMenu = "{$anio}_{$semana}_{$cliente}_{$unidad}_{$subunidad}_{$grupo}";//asi se crea el idMenu
    
    $sql = " INSERT INTO menu SET idMenu = '{$idMenu}', anio = '{$anio}', semana = '{$semana}', numTiempos = '{$tiempos}', cliente = '{$cliente}', unidad = '{$unidad}', subUnidad = '{$subunidad}', costoTot = '{$costo}', elaboro = '{$elaboro}', grupo = '{$grupo}', lunes = '{$lunes}', martes = '{$martes}', miercoles = '{$miercoles}', jueves = '{$jueves}', viernes = '{$viernes}' sabado = '{$sabado}', domingo = '{$domingo}', status = 1, fecha = now(), activo = 1 ";

    echo $sql;

    var_dump($_POST);


//array(15) {
//   ["dias"]=>
//   array(3) {
//     [0]=>
//     string(1) "5"
//     [1]=>
//     string(1) "6"
//     [2]=>
//     string(1) "7"
//   }
//   ["tiempo"]=>
//   array(3) {
//     [0]=>
//     string(1) "1"
//     [1]=>
//     string(1) "3"
//     [2]=>
//     string(1) "4"
//   }
//   ["viernes"]=>
//   array(2) {
//     ["receta"]=>
//     array(3) {
//       [0]=>
//       string(4) "BE14"
//       [1]=>
//       string(3) "SO8"
//       [2]=>
//       string(4) "PL41"
//     }
//     ["personas"]=>
//     array(3) {
//       [0]=>
//       string(2) "10"
//       [1]=>
//       string(2) "40"
//       [2]=>
//       string(2) "70"
//     }
//   }
//   ["sabado"]=>
//   array(2) {
//     ["receta"]=>
//     array(3) {
//       [0]=>
//       string(4) "BE18"
//       [1]=>
//       string(4) "SO80"
//       [2]=>
//       string(4) "PL42"
//     }
//     ["personas"]=>
//     array(3) {
//       [0]=>
//       string(2) "20"
//       [1]=>
//       string(2) "50"
//       [2]=>
//       string(2) "80"
//     }
//   }
//   ["domingo"]=>
//   array(2) {
//     ["receta"]=>
//     array(3) {
//       [0]=>
//       string(4) "BE19"
//       [1]=>
//       string(4) "SO87"
//       [2]=>
//       string(4) "PL43"
//     }
//     ["personas"]=>
//     array(3) {
//       [0]=>
//       string(2) "30"
//       [1]=>
//       string(2) "60"
//       [2]=>
//       string(2) "90"
//     }
//   }
//   ["method"]=>
//   string(7) "addMenu"
// }




  }


  public function getRecetasTiempoSubUnidad(){
    $subunidad = filter_input(INPUT_POST, 'subunidad', FILTER_VALIDATE_INT) or die( toJson(0, 'La unidad es desconocida o invalida') );
    $tiempo = filter_input(INPUT_POST, 'tiempo', FILTER_VALIDATE_INT) or die( toJson(0, 'El tiempo es desconocido o invalido') );


    $r = $this->db->query("SELECT idReceta, nombre, costo, subUnidad FROM receta WHERE 1 AND activo = 1 AND tiempo = '{$tiempo}'");
    $rows = [];
    while( $row = $r->fetch_object() ){

      $partes = array_map(function($item){ 
        return (int) trim($item); 
      }, explode(',', $row->subUnidad) );

      if( in_array( $subunidad, $partes ) ){
        $rows[] = $row;
      }

    }
    // array_pop($rows);
    echo json_encode($rows);

  }

  public function getBases(){

    $r = $this->db->query("SELECT * FROM grupo");
    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo json_encode($rows);
  }

  public function getBase(){
    $id = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT) or die( toJson(0, 'El grupo es desconocida o invalido') );
    $r = $this->db->query("SELECT * FROM grupo WHERE idBase = '{$id}' LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'El grupo solicitado no existe') );

    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addBase(){
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre del grupo es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("INSERT INTO grupo(descripcion, fecha, activo) VALUES ('{$nombre}', now(), 1)");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el grupo, por favor reintente') );

    echo toJson(1, "El grupo {$nombre} se guardo correctamente");

  }


  public function editBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'Error interno, intente nuevamente') );
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre de El grupo es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("UPDATE grupo SET descripcion = '{$nombre}', fecha =  now() WHERE idGrupo = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al modificar El grupo, por favor reintente') );

    echo toJson(1, "El grupo {$nombre} se modifico correctamente");

  }

  public function delBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'El grupo es desconocido o invalido') );
    $r = $this->db->query("DELETE FROM grupo WHERE idGrupo = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El grupo solicitado no existe o no puedo eliminarse, por favor verifique') );
    echo toJson(1, 'El grupo se elimino correctamente');
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Menu = new Menu();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Menu, $method) or die( 'Method not found' );

$Menu->{$method}();//llama a la funcion existente