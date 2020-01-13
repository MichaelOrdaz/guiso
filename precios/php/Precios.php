<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Precios{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getCombinacion(){

    $prov = filter_input(INPUT_POST, 'prov', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es desconocido o invalido') );
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );

    $r = $this->db->query("SELECT precio, info FROM precioprov WHERE activo = 1 AND proveedor = '{$prov}' AND articulo = '{$article}' LIMIT 1");
    
    $this->db->affected_rows > 0 or die( toJson(0, 'La combinacion no existe') );
    
    $row = $r->fetch_object();

    $r = $this->db->query("SELECT unidadA, factor FROM articulo WHERE activo = 1 AND idArticulo = '{$article}' LIMIT 1");
    $art = $r->fetch_object();

    if( $art->unidadA && $art->factor ){
      $row->precioOriginal = $row->precio;   
      $row->precio = $row->precioOriginal * $art->factor;   
    }
    
    echo toJson(1, 'Disponible', ['row'=> $row]);
  }

  public function addPrecio(){

    $proveedor = filter_input(INPUT_POST, 'proveedor', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es desconocido o invalido') );
    $articulo = filter_input(INPUT_POST, 'articulo', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );
    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT) or die( toJson('El costo es invalido') );
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING); 

    $proveedor = $this->getProveedor($proveedor);
    $proveedor or die( toJson(0, 'El Proveedor no existe') );

    $articulo = $this->getArticulo($articulo);
    $articulo or die( toJson(0, 'El articulo no existe') );

    if( $articulo->unidadA && $articulo->factor ){
      $precioInput = $precio;
      $precio = number_format( ( $precioInput / $articulo->factor ), 2, '.', '' );
    }

    //se coloca el precio por unidad de la presentacion

    //buscamos que la combinacion exista o no
    $r = $this->db->query("SELECT precio FROM precioprov WHERE activo = 1 AND proveedor = '{$proveedor->idProveedor}' AND articulo = '{$articulo->idArticulo}' LIMIT 1");
    
    //si la bombinacion existe, actualizamos el costo
    if( $this->db->affected_rows > 0 ){

      $this->db->query("UPDATE precioprov SET precio = '{$precio}', info = '{$info}', fecha = now(), activo = 1 WHERE proveedor = '{$proveedor->idProveedor}' AND articulo = '{$articulo->idArticulo}'");
      $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el precio', ['a'=>$this->db->error]) );
      $msg = 'Se actualiza el costo';

    }
    else{//si la combinacion no existe se inserta

      $this->db->query("INSERT INTO precioprov SET proveedor = '{$proveedor->idProveedor}', articulo = '{$articulo->idArticulo}', precio = '{$precio}', info = '{$info}', fecha = now(), activo = 1");
      $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el precio', ['a'=>$this->db->error]) );
      $msg = 'Se inserta el costo';

    }

    //se inserta en bitacora
    $this->db->query("INSERT INTO precioprovbit SET proveedor = '{$proveedor->idProveedor}', articulo = '{$articulo->idArticulo}', precio = '{$precio}', fecha = now()");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar bitacora', ['a'=>$this->db->error]) );
     
    //Se busca cual es valor mínimo en la tabla precioProv
    //este query siempre devuelve algo, por que arriba se inserta es logico
    $r = $this->db->query("SELECT MIN(precio) as min FROM precioprov WHERE activo = 1 AND articulo = '{$articulo->idArticulo}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error obteniendo el precio minimo', ['a'=>$this->db->error]) );

    $minimo = $r->fetch_object()->min;

    $this->db->query("UPDATE articulo SET costo = '{$minimo}', fechaMod = now() WHERE idArticulo = '{$articulo->idArticulo}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error actualizando el precio minimo del articulo', ['a'=>$this->db->error]) );

    $this->actualizarCostoRecetas( $articulo->idArticulo );

    echo toJson(1, "El precio del artículo al proveedor ha sido asignado", ['a'=> $msg]);

  }

  public function getProveedor( $id ){
    $r = $this->db->query("SELECT * FROM proveedor WHERE idProveedor = '{$id}' AND activo = 1 LIMIT 1");
    if( $this->db->affected_rows > 0 ){
      return $r->fetch_object();
    }
    else{
      return false;
    }
  }

  public function getArticulo( $id ){
    $r = $this->db->query("SELECT * FROM articulo WHERE idArticulo = '{$id}' AND activo = 1 LIMIT 1");
    if( $this->db->affected_rows > 0 ){
      return $r->fetch_object();
    }
    else{
      return false;
    }
  }

  public function getPrecios(){

    $requestData = $_POST;
    // los indices de las columnas de datatable deben coincidir conm el nombrte en la base de datos
    $columns = array(
      0 => 'proveedorName',
      1 => "articuloName",
      2 => 'unidad',
      3 => "unidadA",
      4 => "cantidad",
      5 => "precio",
      6 => "info",
      7 => "fecha",
    );

    $totalFiltered = $totalData = 0;

    $sql = "SELECT pp.id, pro.nombre AS proveedorName, pp.proveedor, pp.articulo, art.nombre AS articuloName, pp.precio, pp.info, pp.fecha, art.unidadA, art.unidad, art.factor FROM precioprov as pp inner join proveedor as pro on pp.proveedor = pro.idProveedor inner join articulo as art on art.idArticulo = pp.articulo WHERE pp.activo = 1 AND art.activo = 1 AND pro.activo = 1";
    $sqlCount = "SELECT COUNT(*) AS total FROM precioprov as pp inner join proveedor as pro on pp.proveedor = pro.idProveedor inner join articulo as art on art.idArticulo = pp.articulo WHERE pp.activo = 1 AND art.activo = 1 AND pro.activo = 1";

    $result = $this->db->query( $sqlCount );
    $totalData = $totalFiltered = $result->fetch_object()->total;

    // Si exiten parametros de busqueda (provenientes del cuadro de busqueda da la datatable) se aplican
    // los campos evaluados en el where se deben reemplazar por los que contenga la tabla a seleccionar
    if( ! empty( $requestData['search']['value'] ) ):
      $sqlSearch = " AND ( proveedorName LIKE '%{$requestData['search']['value']}%' OR articuloName LIKE '%{$requestData['search']['value']}%' )";
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

    $rows = [];
    while( $row = $result->fetch_object() ){
      
      if( $row->unidadA && $row->factor ){
        $row->precio = $row->precio * $row->factor;
      }

      $rows[] = $row;
    }

    //Este array es el que recibe la datatable y convierte en el resultado deseado
    $data = array(
      "draw" => intval($requestData['draw']),   // Registros por paginado
      "recordsTotal" => intval($totalData),   // Registros totales
      "recordsFiltered" => intval($totalFiltered),// Registros filtrados por el cuadro de busqueda
      "data" => $rows,  // Objeto que contiene la tabla a ser mostrada
      "sql"=> $sql
    );

    echo json_encode($data);

  }

  public function getRelacionProvArt( $id ){
    $r = $this->db->query("SELECT * FROM precioprov WHERE id = '{$id}' LIMIT 1");
    if( $this->db->affected_rows > 0 ){
      return $r->fetch_object();
    }
    else{
      return false;
    }
  }

  public function delPrecio(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El registro es desconocido o invalido') );
    // $articulo = filter_input(INPUT_POST, 'articulo', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );
    $relacion = $this->getRelacionProvArt( $id );
    $relacion or die( toJson(0, 'La relacion proveedor-articulo no fue encontrada, por favor reintente') );
    
    $articulo = $relacion->articulo;

    //aqui primero selecciono
    $r = $this->db->query("DELETE FROM precioprov WHERE id = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El precio solicitado no existe o no puedo eliminarse, por favor verifique') );
    
    //Se busca cual es valor mínimo en la tabla precioProv
    ////este query puede devolver null si se borran todos los precios de los articulos
    $r = $this->db->query("SELECT IFNULL(MIN(precio), 0) as min FROM precioprov WHERE activo = 1 AND articulo = '{$articulo}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error obteniendo el precio minimo', ['a'=>$this->db->error]) );

    $minimo = $r->fetch_object()->min;

    $this->db->query("UPDATE articulo SET costo = '{$minimo}', fechaMod = now() WHERE idArticulo = '{$articulo}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error actualizando el precio minimo del articulo', ['a'=>$this->db->error]) );

    $this->actualizarCostoRecetas( $articulo );

    echo toJson(1, 'El Precio se elimino correctamente');
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

  public function editPrecio(){

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El registro es desconocido o invalido') );

    $relacion = $this->getRelacionProvArt($id);
    $relacion or die( toJson(0, 'El registro es incorrecto, por favor reintente') );

    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT) or die( toJson('El costo es invalido') );
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING); 

    $proveedor = $this->getProveedor($relacion->proveedor);
    $proveedor or die( toJson(0, 'El Proveedor no existe') );

    $articulo = $this->getArticulo($relacion->articulo);
    $articulo or die( toJson(0, 'El articulo no existe') );

    if( $articulo->unidadA && $articulo->factor ){
      $precioInput = $precio;
      $precio = number_format( ( $precioInput / $articulo->factor ), 2, '.', '' );
    }

    $this->db->query("UPDATE precioprov SET precio = '{$precio}', info = '{$info}', fecha = now(), activo = 1 WHERE id = '{$id}'");
      $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el precio', ['a'=>$this->db->error]) );
      $msg = 'Se actualiza el costo';

    //se inserta en bitacora
    $this->db->query("INSERT INTO precioprovbit SET proveedor = '{$proveedor->idProveedor}', articulo = '{$articulo->idArticulo}', precio = '{$precio}', fecha = now()");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar bitacora', ['a'=>$this->db->error]) );
     
    //Se busca cual es valor mínimo en la tabla precioProv
    //este query siempre devuelve algo, por que arriba se inserta es logico
    $r = $this->db->query("SELECT MIN(precio) as min FROM precioprov WHERE activo = 1 AND articulo = '{$articulo->idArticulo}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error obteniendo el precio minimo', ['a'=>$this->db->error]) );

    $minimo = $r->fetch_object()->min;

    $this->db->query("UPDATE articulo SET costo = '{$minimo}', fechaMod = now() WHERE idArticulo = '{$articulo->idArticulo}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'Error actualizando el precio minimo del articulo', ['a'=>$this->db->error]) );

    $this->actualizarCostoRecetas( $articulo->idArticulo );

    echo toJson(1, "El precio del artículo al proveedor ha sido reasignado", ['a'=> $msg]);
     
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Precios = new Precios();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Precios, $method) or die( 'Method not found' );

$Precios->{$method}();//llama a la funcion existente