<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Proveedor{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getProveedores(){

    $r = $this->db->query("SELECT * FROM proveedor WHERE activo =  1");
    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo json_encode($rows);
  }

  public function checkProveedor( $name ){
    $this->db->query("SELECT idProveedor FROM proveedor WHERE nombre = '{$name}' LIMIT 1");
    return $this->db->affected_rows > 0;
  }

  public function addProveedor(){

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper($nombre);

    ! $this->checkProveedor( $nombre ) or die( toJson(0, 'EL nombre del proveedor ya existe, por favor cambie el nombre') );
    
    $rfc = filter_input(INPUT_POST, 'rfc', FILTER_SANITIZE_STRING) or die( toJson(0, 'El rfc es invalido') );
    if( strlen($rfc) <= 11 || strlen($rfc) >= 14 ){
      die( toJson(0, 'EL rfc es incorrecto') );
    }
    $rfc = strtoupper($rfc);
    
    $address = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
    $address = ucwords( strtolower( $address ) );
    $tel = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'pago', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $this->db->query("INSERT INTO proveedor (telefono, rfc, tipo, nombre, info, fecha, estado, direccion, pago, cp, correo, contacto, ciudad, activo) VALUES ('{$tel}', '{$rfc}', '{$tipo}', '{$nombre}', '{$info}', now(), '{$estado}', '{$address}', '{$pago}', '{$cp}', '{$correo}', '{$contacto}', '{$ciudad}', 1)");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el proveedor, por favor reintente', ['e'=> $this->db->error]) );

    echo toJson(1, "El proveedor {$nombre} se guardo correctamente");

  }


  public function editProveedor(){
    $id = filter_input(INPUT_POST, 'idProveedor', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es invalido') );

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper($nombre);

    ! $this->checkProveedor( $nombre ) or die( toJson(0, 'EL nombre del proveedor ya existe, por favor cambie el nombre') );
    
    $rfc = filter_input(INPUT_POST, 'rfc', FILTER_SANITIZE_STRING) or die( toJson(0, 'El rfc es invalido') );
    if( strlen($rfc) <= 11 || strlen($rfc) >= 14 ){
      die( toJson(0, 'EL rfc es incorrecto') );
    }
    $rfc = strtoupper($rfc);
    
    $address = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
    $address = ucwords( strtolower( $address ) );
    $tel = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'pago', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $sql = "UPDATE proveedor SET telefono = '{$tel}', rfc = '{$rfc}', pago = '{$pago}', nombre = '{$nombre}', info = '{$info}', fecha = now(), estado = '{$estado}', direccion = '{$address}', tipo = '{$tipo}', cp = '{$cp}', correo = '{$correo}', contacto = '{$contacto}', ciudad = '{$ciudad}' WHERE idProveedor = '{$id}'";
    $this->db->query($sql);

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el proveedor, por favor reintente y/o verifique') );

    echo toJson(1, "El proveedor {$nombre} se modifico correctamente", ['s'=>$sql]);

  }

  public function getProveedor( $id ){
    $r = $this->db->query("SELECT * FROM proveedor WHERE activo = 1 AND idProveedor = '{$id}' LIMIT 1");
    if( $this->db->affected_rows > 0 ){
      return $r->fetch_object();
    }
    else{
      return false;
    }
  }

  public function delProveedor(){

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es desconocido o invalido') );
    
    $proveedor = $this->getProveedor( $id );
    $proveedor or die( toJson(0, 'El proveedor no existe') );

    //como elimino los proveedores los precios deben actualizarse
    //mi logica es si elimino un proveedor, debo eliminar los registros de previoprov que tengan ese proveedor, 
    //y si elimino esos registros deberia reactualizarse el costo de los articulos relacionados a ese proveedor al minimo de los proveedores que si existan
    //y si se actualizan los costos recalcular otra vez los costos de las recetas;
    

    //seleccionar los registros de precioprov donde el proveedor sewa igual al proveedor que se va a eliminar
    // $r = $this->db->query("SELECT id FROM precioprov WHERE proveedor = '{$id}'");

    //aqui recuperariamos los id de las relaciones del proveedor, tambien podemos poner los articulos que son de ese proveedor
    

    // aplicar los pasos de borrarprecioproveedor del archivo Precios.php en un bucle con el id recuperado de los registros
    $r = $this->db->query("SELECT id FROM precioprov WHERE proveedor = '{$id}'");
    while( $row = $r->fetch_object() ){

      $relacion = $this->getRelacionProvArt( $row->id );
      $relacion or die( toJson(0, 'La relacion proveedor-articulo no fue encontrada, por favor reintente') );
      
      $articulo = $relacion->articulo;

      //aqui primero selecciono
      $r = $this->db->query("DELETE FROM precioprov WHERE id = '{$row->id}'");
      $this->db->affected_rows > 0 or die( toJson(0, 'El precio solicitado no existe o no puedo eliminarse, por favor verifique') );
      
      //Se busca cual es valor mínimo en la tabla precioProv
      ////este query puede devolver null si se borran todos los precios de los articulos
      $r = $this->db->query("SELECT IFNULL(MIN(precio), 0) as min FROM precioprov WHERE activo = 1 AND articulo = '{$articulo}'");
      $this->db->affected_rows > 0 or die( toJson(0, 'Error obteniendo el precio minimo', ['a'=>$this->db->error]) );

      $minimo = $r->fetch_object()->min;

      $this->db->query("UPDATE articulo SET costo = '{$minimo}', fechaMod = now() WHERE idArticulo = '{$articulo}'");
      $this->db->affected_rows > 0 or die( toJson(0, 'Error actualizando el precio minimo del articulo', ['a'=>$this->db->error]) );

      $this->actualizarCostoRecetas( $articulo );

    }//endWhile

    $r = $this->db->query("DELETE FROM proveedor WHERE idProveedor = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El proveedor solicitado no existe o no puedo eliminarse, por favor verifique') );


    echo toJson(1, 'El proveedor se elimino correctamente, los precios del  proveedor han sido eliminados');
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


  public function __destruct(){
    $this->db->close();
  }


}

$Proveedor = new Proveedor();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Proveedor, $method) or die( 'Method not found' );

$Proveedor->{$method}();//llama a la funcion existente