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

  public function getBase(){
    $id = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT) or die( toJson(0, 'El grupo es desconocida o invalido') );
    $r = $this->db->query("SELECT * FROM grupo WHERE idBase = '{$id}' LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'El grupo solicitado no existe') );

    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addProveedor(){

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper($nombre);
    
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
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es invalido') );

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre es invalido') );
    $nombre = strtoupper($nombre);
    
    $rfc = filter_input(INPUT_POST, 'rfc', FILTER_SANITIZE_STRING) or die( toJson(0, 'El rfc es invalido') );
    if( strlen($rfc) <= 11 || strlen($rfc) >= 14 ){
      die( toJson(0, 'EL rfc es incorrecto') );
    }
    $rfc = strtoupper($rfc);
    
    $address = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
    $address = ucwords( strtolower( $address ) );
    $tel = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'pago', FILTER_SANITIZE_NUMBER_INT);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $this->db->query("UPDATE proveedor SET telefono = '{$tel}', rfc = '{$rfc}', pago = '{$pago}', nombre = '{$nombre}', info = '{$info}', fecha = now(), estado = '{$estado}', direccion = '{$address}', tipo = '{$tipo}', cp = '{$cp}', correo = '{$correo}', contacto = '{$contacto}', ciudad = '{$ciudad}' WHERE idCliente = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el proveedor, por favor reintente y/o verifique') );

    echo toJson(1, "El proveedor {$nombre} se modifico correctamente");

  }

  public function delProveedor(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'El proveedor es desconocido o invalido') );
    $r = $this->db->query("DELETE FROM proveedor WHERE idProveedor = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El proveedor solicitado no existe o no puedo eliminarse, por favor verifique') );
    echo toJson(1, 'El proveedor se elimino correctamente');
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Proveedor = new Proveedor();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Proveedor, $method) or die( 'Method not found' );

$Proveedor->{$method}();//llama a la funcion existente