<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Article{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getArticulos(){

    $requestData = $_POST;
    // los indices de las columnas de datatable deben coincidir conm el nombrte en la base de datos
    $columns = array(
      0 => 'idArticulo',
      1 => "nombre",
      2 => 'descripcion',
      3 => "unidad",
      4 => "unidadA",
      5 => "factor",
      6 => "minimo",
      7 => "maximo",
      8 => "costo",
      9 => "fechaMod",
    );

    $totalFiltered = $totalData = 0;

    $sql = "SELECT art.idArticulo, art.nombre, art.unidad, art.unidadA, art.factor, art.minimo, art.maximo, art.costo, li.descripcion, art.linea, art.fechaMod, art.info FROM articulo AS art LEFT JOIN linea as li ON li.idLinea = art.linea WHERE art.activo = 1 ";
    $sqlCount = "SELECT COUNT(*) AS total FROM articulo AS art LEFT JOIN linea as li ON li.idLinea = art.linea WHERE art.activo = 1";

    $result = $this->db->query( $sqlCount );
    $totalData = $totalFiltered = $result->fetch_object()->total;

    // Si exiten parametros de busqueda (provenientes del cuadro de busqueda da la datatable) se aplican
    // los campos evaluados en el where se deben reemplazar por los que contenga la tabla a seleccionar
    if( ! empty( $requestData['search']['value'] ) ):
      $sqlSearch = " AND ( idArticulo LIKE '%{$requestData['search']['value']}%' OR nombre LIKE '%{$requestData['search']['value']}%' )";
      $sql .= $sqlSearch;
      $sqlCount .= $sqlSearch;
      $result = $this->db->query( $sqlCount );
      $totalFiltered = $result->fetch_object()->total;
    endif;

    // Es importante declarar el array colums de esa forma la datatable podrá ordenar ascendente o descendente los registros
    // start y lengt en el limit son los encargados de solicitar el numero de pagina de la data table
    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] ." {$requestData['order'][0]['dir']} LIMIT {$requestData['start']}, {$requestData['length']} ";
    //ejecutamos el query Final
    $result = $this->db->query( $sql );

    while( $rows[] = $result->fetch_object() );
    array_pop( $rows );

    //Este array es el que recibe la datatable y convierte en el resultado deseado
    $data = array(
      "draw" => intval($requestData['draw']),   // Registros por paginado
      "recordsTotal" => intval($totalData),   // Registros totales
      "recordsFiltered" => intval($totalFiltered),// Registros filtrados por el cuadro de busqueda
      "data" => $rows,  // Objeto que contiene la tabla a ser mostrada
      // "sql"=> $sql
    );

    echo json_encode($data);
  
  }

  public function getAllArticulos(){
    $r = $this->db->query("SELECT idArticulo, nombre, unidad, unidadA, factor, (SELECT descripcion FROM linea WHERE idLinea = linea) as descripcion FROM articulo WHERE activo = 1 ORDER BY nombre");
    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo json_encode($rows);
  }

  public function getArticleMatch(){

    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );
    $r = $this->db->query("SELECT idArticulo, nombre, costo FROM articulo WHERE activo = 1 AND nombre LIKE '%{$term}%' ORDER BY nombre LIMIT 25");
    $rows = [];
    while( $row = $r->fetch_object() ){
      $rows[] = [ 'id'=> $row->idArticulo, 'text'=> $row->nombre, 'costo'=> $row->costo ];
    }
    // array_pop($rows);
    
    $response = ['results'=> $rows];

    echo json_encode($response); 
  }

  public function getArticle(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );
    $r = $this->db->query("SELECT * FROM articulo WHERE idArticulo = '{$id}' AND activo = 1 LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'El articulo solicitado no existe') );
    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addArticle(){

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper( trim($nombre));
    
    $linea = filter_input(INPUT_POST, 'linea', FILTER_VALIDATE_INT) or die( toJson(0, 'La linea es invalida') );
    
    $unidad = filter_input(INPUT_POST, 'unidad', FILTER_SANITIZE_STRING) or die( toJson(0, 'La unidad es invalida') );
    
    $presentacion = filter_input(INPUT_POST, 'presentacion', FILTER_SANITIZE_STRING);
    if( $presentacion === '' ){
      $factor = 0;
    }
    else{
      $factor = filter_input(INPUT_POST, 'factor', FILTER_VALIDATE_FLOAT) or die( toJson(0, 'El factor es invalido, debe ser un numero mayor a 0') );
    }

    $opciones = array(
      'options' => array(
        'default' => 0 // valor a retornar si el filtro falla
      ),
    );

    $minimo = filter_input(INPUT_POST, 'minimo', FILTER_VALIDATE_FLOAT, $opciones);
    $maximo = filter_input(INPUT_POST, 'maximo', FILTER_VALIDATE_FLOAT, $opciones);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $r = $this->db->query("SELECT descripcion FROM linea WHERE idLinea = '{$linea}' LIMIT 1");
    $lineaLetra = $this->db->affected_rows > 0 ? $r->fetch_object()->descripcion : 'AB';//AB por default

    $lineaLetra = $this->quitarAcentos( $lineaLetra );
    $idArticulo = $this->generarClaveArticulo($lineaLetra, 'articulo');

    $this->db->query("INSERT INTO articulo SET idArticulo = '{$idArticulo}', nombre = '{$nombre}', linea = '{$linea}', unidad = '{$unidad}', unidadA = '{$presentacion}', factor = '{$factor}', minimo = '{$minimo}', maximo = '{$maximo}', costo = '0', salida = now(), entrada = now(), fecha = now(), fechaMod = now(), info = '{$info}', activo = 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el articulo, por favor reintente', ['e'=> $this->db->error]) );

    echo toJson(1, "El articulo {$nombre} se guardo correctamente con clave {$idArticulo}");

  }


  public function updateArticle(){

    $idArticulo = filter_input(INPUT_POST, 'idArticulo', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es invalido reintente') );

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper( trim($nombre));
    
    $linea = filter_input(INPUT_POST, 'linea', FILTER_VALIDATE_INT) or die( toJson(0, 'La linea es invalida') );
    
    $unidad = filter_input(INPUT_POST, 'unidad', FILTER_SANITIZE_STRING) or die( toJson(0, 'La unidad es invalida') );
    
    $presentacion = filter_input(INPUT_POST, 'presentacion', FILTER_SANITIZE_STRING);
    if( $presentacion === '' ){
      $factor = 0;
    }
    else{
      $factor = filter_input(INPUT_POST, 'factor', FILTER_VALIDATE_FLOAT) or die( toJson(0, 'El factor es invalido, debe ser un numero mayor a 0') );
    }

    $opciones = array(
      'options' => array(
        'default' => 0 // valor a retornar si el filtro falla
      ),
    );

    $minimo = filter_input(INPUT_POST, 'minimo', FILTER_VALIDATE_FLOAT, $opciones);
    $maximo = filter_input(INPUT_POST, 'maximo', FILTER_VALIDATE_FLOAT, $opciones);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $this->db->query("UPDATE articulo SET idArticulo = '{$idArticulo}', nombre = '{$nombre}', linea = '{$linea}', unidad = '{$unidad}', unidadA = '{$presentacion}', factor = '{$factor}', minimo = '{$minimo}', maximo = '{$maximo}', fechaMod = now(), info = '{$info}' WHERE idArticulo = '{$idArticulo}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al modificar el articulo, por favor reintente', ['e'=> $this->db->error]) );

    echo toJson(1, "El articulo {$nombre} se modifico correctamente");

  }

  public function delCliente(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'El Articulo es desconocido o invalido') );
    $r = $this->db->query("UPDATE articulo SET activo = '0', fechaMod = now() WHERE idArticulo = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'El articulo solicitado no existe o no puedo eliminarse, por favor verifique') );
    
    //si elimino un articulo debe desaparecer de la receta, pues asi lo hacemmos y actualizamos el costo de la receta
    $this->actualizarCostoRecetas( $id );

    echo toJson(1, 'El articulo se elimino correctamente');
  }


    //actualiza el costo de las recetas cuando un articulo cambia de precio
  public function actualizarCostoRecetas( $idArticulo ){

    $sql = "SELECT re.idReceta, (SUM( reart.cantidad * art.costo ) / re.porciones) AS nuevoCosto, re.costo as costoReceta FROM receta AS re JOIN recetaart AS reart ON re.idReceta=reart.receta JOIN articulo AS art ON art.idArticulo=reart.articulo WHERE 1 AND re.idReceta IN ( SELECT re.idReceta FROM receta AS re JOIN recetaart AS reart ON re.idReceta=reart.receta WHERE reart.articulo = '{$idArticulo}' ) GROUP BY re.idReceta";
    $r = $this->db->query($sql);

    if( $this->db->affected_rows === 0 ){
      return;//no hay datos asociados a recetas
    }

    while( $row = $r->fetch_object() ){
      //por cada receta recalculamos el costo en el query y si el costo es diferente aplicamos un update
      if( $row->costoReceta != $row->nuevoCosto ){//si el cossto que voy a actualizar es diferente al que tiene realizo el query
        $sql = sprintf("UPDATE receta SET costo = '%01.2f', fechaMod = now() WHERE idReceta = '%s'", $row->nuevoCosto, $row->idReceta);
        $this->db->query($sql);
      }

    }

  }


  private function generarClaveArticulo( $linea, $key ){

    //$sacamos las dos primeras letras del tiempo
    $abbr = $linea[0].$linea[1];
    $abbr = strtoupper($abbr);

    $r = $this->db->query("SELECT valor FROM clave WHERE llave = '{$key}'");
    $r = $r->fetch_object();

    //si es nullo lo insertamos
    if( is_null( $r->valor ) ){
      $r = $this->db->query("INSERT INTO clave (llave, valor) VALUES ('{$key}', 1)");
      return $abbr.'1';
    }
    else{
      //lo actualizamos.
      $this->db->query("UPDATE clave SET valor = valor + 1 WHERE llave = '{$key}'");
      return $abbr . ( $r->valor + 1 );
    }

  }

  private function quitarAcentos( $cadena ){
    $search  = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'ñ', 'Ñ');
    $replace = array('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u', 'n', 'N');
    return str_replace($search, $replace, $cadena);
  }




  public function __destruct(){
    $this->db->close();
  }


}

$Article = new Article();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Article, $method) or die( 'Method not found' );

$Article->{$method}();//llama a la funcion existente