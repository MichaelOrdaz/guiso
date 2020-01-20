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

    //rescata los dias checkeados,
    $listaDias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
    foreach ($listaDias as $key => $value) {
      $$value = 0;//cramos lunes martes miercoles etc en 0
      if( in_array( ( $key + 1 ), $_POST['dias'] ) ) $$value = 1;
    }

    //de rango saco el año
    //calculamos fechas del rango de fechas
    $partes = explode(' - ', $rango);//dividimos la cadena

    try {
      // $fechaInicial = new DateTime( $rango[0] );
      $fecha = new DateTime($partes[0]);
    } catch (Exception $e) {
      exit( toJson(0, 'La fecha es incorrecta') );
    }

    $anio = $fecha->format('Y');
    // echo $anio;

    //se compruewba que el menu no exista
    $sql = "SELECT idMenu FROM menu WHERE semana = '{$semana}' AND cliente = '{$cliente}' AND unidad = '{$unidad}' AND subUnidad = '{$subunidad}' AND grupo = '{$grupo}' AND anio = '{$anio}'";
    $this->db->query( $sql );

    $this->db->affected_rows === 0 or die( toJson(0, 'El menú para esta semana, cliente, unidad, sub-unidad y grupo (servicio) ya existe') );

    $idMenu = "{$anio}_{$semana}_{$cliente}_{$unidad}_{$subunidad}_{$grupo}";//asi se crea el idMenu
    
    $sql = " INSERT INTO menu SET idMenu = '{$idMenu}', anio = '{$anio}', semana = '{$semana}', lapso = '{$rango}', numTiempos = '{$tiempos}', cliente = '{$cliente}', unidad = '{$unidad}', subUnidad = '{$subunidad}', costoTot = '{$costo}', elaboro = '{$elaboro}', grupo = '{$grupo}', lunes = '{$lunes}', martes = '{$martes}', miercoles = '{$miercoles}', jueves = '{$jueves}', viernes = '{$viernes}', sabado = '{$sabado}', domingo = '{$domingo}', status = 1, fecha = now(), activo = 1 ";

    // echo $sql;
    $this->db->query( $sql );

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el menu, por favor reintente') );

    //ahora insertamos en menurec
    // necesito hacer el bucle por dias

    $debug = [];

    foreach ($_POST['dias'] as $dia){
      
      $i = 0;
      foreach ($_POST['tiempo'] as $tiempo){
        
        $diaNumber = (int) $dia - 1;

        $dayOfWeek = $listaDias[ $diaNumber ];//lunes, martes, miercoles, etc
        
        // echo "El dia $dia $dayOfWeek el tiempo $tiempo";

        $idReceta = $_POST[$dayOfWeek]['receta'][$i];
        $personas = $_POST[$dayOfWeek]['personas'][$i];
        
        // echo "colocamos la receta $idReceta con $personas <br>";

        //en pos coloco el dia de la semana esto es del 1 al 7 lunes, martes
        //en tiempos coloco el numero del tiempo como cantidad esto es coloco 1, 2, 3, 4, 5, n...
        //es como la posision del tiempo, no es su id de tiempo
        
        $receta = $this->getReceta($idReceta);
        $recetaName = '';
        $costo = 0;
        if( $receta ){//si la receta existe
          $recetaName = $receta->nombre;
          $costo = $receta->costo;
        }
        else{
          $personas = 0;
        }

        //obtenemos fecha
        //se me ocurre crear otra estancia de DT a partir de la fecha
        $dt = new DateTime( $fecha->format('Y-m-d') );//creamos la fecha a partir del dia inicial
        // $periodo = $dia - 1;
        $dt->add( new DateInterval("P{$diaNumber}D") );//le añadimos el dia checkeado - 1;

        $sql = "INSERT INTO menurec SET idMenu = '{$idMenu}', pos = '{$dia}', receta = '{$recetaName}', precio = '{$costo}', personas = '{$personas}', tiempo = '{$tiempo}', fecha = '{$dt->format('Y-m-d')}'";
        
        // echo $sql . "<br>";
        $this->db->query( $sql );

        $debug[] = $this->db->affected_rows;

        $i++;
      }

    }

    //si hay negativos en debug hubo errores
    if( in_array(-1, $debug) ){
      echo toJson(1, 'Se guardo el menu con algunos errores, por favor verifique');
    }
    else{
      echo toJson(1, 'Se guardo el menu correctamente');
    }

    // var_dump($_POST);
    // $sql = " INSERT INTO menurec SET idMenu = '{$idMenu}', pos = '{$anio}', receta = '{$semana}', precio = '{$tiempos}', personas = '{$cliente}', fecha = now()";


    //dias son los checkbox entoces de aqui modificamos la fecha
    //$tiempo son los select de tiempo con los id de los tiempos
    //
    //
    // luego tenemos variables que se llaman dependiendo el dia seleccionado
    // por ejemplo si selecciono em dias 1 existira la varialbe lunes
    // si existe dias 2 existira martes, etc
    // cada una de esas variables es otro array con dos key uno para personas u otro para recetas, y cada array tiene como longitud la varible tiempo
    // 

  }

  private function getReceta( $id ){
    $r = $this->db->query("SELECT * FROM receta WHERE activo = 1 AND idReceta = '{$id}' LIMIT 1");
    return $this->db->affected_rows > 0 ? $r->fetch_object() : false;
  }

  public function getRecetasTiempoSubUnidadMatch(){

    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING) or die( toJson(0, 'La receta es desconocida o invalida', ['results'=> [] ] ) );
    $subunidad = filter_input(INPUT_POST, 'sub', FILTER_VALIDATE_INT) or die( toJson(0, 'La subunidad es desconocida o invalida', ['results'=> [] ] ) );
    $tiempo = filter_input(INPUT_POST, 'tiempo', FILTER_VALIDATE_INT) or die( toJson(0, 'El tiempo es desconocido o invalido', ['results'=> [] ] ) );

    $r = $this->db->query("SELECT idReceta, nombre, costo, subUnidad FROM receta WHERE activo = 1 AND nombre LIKE '%{$term}%' AND tiempo = '{$tiempo}' ORDER BY nombre LIMIT 25");
    $rows = [];
    while( $row = $r->fetch_object() ){

      $partes = array_map(function($item){ 
        return (int) trim($item); 
      }, explode(',', $row->subUnidad) );

      if( in_array( $subunidad, $partes ) ){
        $rows[] = [ 'id'=> $row->idReceta, 'text'=> $row->nombre, 'costo'=> $row->costo ];
      }
    }
    $response = ['results'=> $rows];
    echo json_encode($response); 

  }

  public function getRecetasTiempoSubUnidad(){
    $subunidad = filter_input(INPUT_POST, 'subunidad', FILTER_VALIDATE_INT) or die( toJson(0, 'La unidad es desconocida o invalida') );
    $tiempo = filter_input(INPUT_POST, 'tiempo', FILTER_VALIDATE_INT) or die( toJson(0, 'El tiempo es desconocido o invalido') );


    $r = $this->db->query("SELECT idReceta, nombre, costo, subUnidad FROM receta WHERE 1 AND activo = 1 AND tiempo = '{$tiempo}' ORDER BY  nombre");
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


  public function getMenus(){

    ( $cliente = filter_input(INPUT_POST, 'cliente', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'El Cliente es desconocido o invalido') );
    ( $unidad = filter_input(INPUT_POST, 'unidad', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'La unidad es desconocida o invalida') );
    ( $subunidad = filter_input(INPUT_POST, 'subunidad', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'La subunidad es desconocida o invalida') );
    ( $grupo = filter_input(INPUT_POST, 'grupo', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'El Grupo es desconocido o invalido') );
    ( $semana = filter_input(INPUT_POST, 'semana', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'La semana es desconocida o invalida') );
    ( $year = filter_input(INPUT_POST, 'anio', FILTER_VALIDATE_INT) ) !== FALSE or die( toJson(0, 'La año es desconocido o invalido') );

    $where = '';
    if( $cliente ) $where .= " AND cliente = '{$cliente}' ";
    if( $unidad ) $where .= " AND unidad = '{$unidad}' ";
    if( $subunidad ) $where .= " AND subunidad = '{$subunidad}' ";
    if( $grupo ) $where .= " AND grupo = '{$grupo}' ";
    if( $semana ) $where .= " AND semana = '{$semana}' ";
    if( $year ) $where .= " AND anio = '{$year}' ";

    $sql = "SELECT idMenu, lapso, numTiempos, costoTot, elaboro, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM menu WHERE 1 AND activo = 1 {$where} ORDER BY fecha DESC LIMIT 100";
    $r = $this->db->query( $sql );

    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo toJson(1, 'OK', ['results'=>$rows, 'sql'=> $sql]);
  }

  public function getMenu(){

    $menu = filter_input(INPUT_POST, 'menu', FILTER_SANITIZE_STRING) or die( toJson(0, 'El menu invalido') );

    $r = $this->db->query("SELECT *, 
      (SELECT nombre FROM cliente WHERE idCliente = menu.cliente ) AS clienteName, 
      (SELECT unidad FROM unidad WHERE idUnidad = menu.unidad) AS unidadName, 
      (SELECT subunidad.subUnidad FROM subunidad WHERE idSUnidad = menu.subunidad ) AS subunidadName, 
      (SELECT descripcion FROM grupo WHERE idGrupo = menu.grupo) AS grupoName 
      FROM menu WHERE idMenu = '{$menu}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El menu solicitado no existe') );

    echo toJson(1, 'OK', ['result'=> $r->fetch_object()]);

  }


  public function getBodyMenu(){

    $menu = filter_input(INPUT_POST, 'menu', FILTER_SANITIZE_STRING) or die( toJson(0, 'El menu invalido') );

    $r = $this->db->query("SELECT *, (SELECT idReceta FROM receta WHERE nombre = menurec.receta LIMIT 1) AS idReceta FROM menurec WHERE idMenu = '{$menu}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'El menu solicitado no existe') );

    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);

    echo toJson(1, 'OK', ['results'=> $rows]);
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