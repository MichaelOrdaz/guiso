<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Clientes{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getCombinacion(){

    $prov = filter_input(INPUT_POST, 'prov', FILTER_VALIDATE_INT) or die( toJson(0, 'El proveedor es desconocido o invalido') );
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING) or die( toJson(0, 'El articulo es desconocido o invalido') );

    $r = $this->db->query("SELECT precio FROM precioprov WHERE activo = 1 AND proveedor = '{$prov}' AND articulo = '{$article}' LIMIT 1");
    
    $this->db->affected_rows > 0 or die( toJson(0, 'La combinacion no existe') );
    
    $row = $r->fetch_object();

    $r = $this->db->query("SELECT unidadA, factor FROM articulo WHERE activo = 1 AND idArticulo = '{$article}' LIMIT 1");
    $art = $r->fetch_object();

    if( $art->unidadA && $art->factor ){
      $row->precioAlt = $row->precio;   
      $row->precio = $row->precioAlt * $art->factor;   
    }
    
    echo toJson(1, 'Disponible', ['row'=> $row]);
  }

  public function getCliente(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El Cliente es desconocida o invalido') );
    $r = $this->db->query("SELECT * FROM cliente WHERE idCliente = '{$id}' LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'El Cliente solicitado no existe') );

    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addCliente(){

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
    $plazo = filter_input(INPUT_POST, 'plazo', FILTER_SANITIZE_NUMBER_INT);
    $credito = filter_input(INPUT_POST, 'credito', FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);


    $this->db->query("INSERT INTO cliente (telefono, rfc, plazo, nombre, info, fecha, estado, direccion, credito, cp, correo, contacto, ciudad, activo) VALUES ('{$tel}', '{$rfc}', '{$plazo}', '{$nombre}', '{$info}', now(), '{$estado}', '{$address}', '{$credito}', '{$cp}', '{$correo}', '{$contacto}', '{$ciudad}', 1)");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el cliente, por favor reintente', ['e'=> $this->db->error]) );

    echo toJson(1, "El cliente {$nombre} se guardo correctamente");

  }


  public function updateCliente(){

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El cliente es invalido') );

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
    $plazo = filter_input(INPUT_POST, 'plazo', FILTER_SANITIZE_NUMBER_INT);
    $credito = filter_input(INPUT_POST, 'credito', FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_STRING);

    $this->db->query("UPDATE cliente SET telefono = '{$tel}', rfc = '{$rfc}', plazo = '{$plazo}', nombre = '{$nombre}', info = '{$info}', fecha = now(), estado = '{$estado}', direccion = '{$address}', credito = '{$credito}', cp = '{$cp}', correo = '{$correo}', contacto = '{$contacto}', ciudad = '{$ciudad}' WHERE idCliente = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el cliente, por favor reintente y/o verifique') );

    echo toJson(1, "El cliente {$nombre} se modifico correctamente");

  }

  public function delCliente(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'El cliente es desconocido o invalido') );
    $r = $this->db->query("UPDATE cliente SET activo = '0', fecha = now() WHERE idCliente = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'El grupo solicitado no existe o no puedo eliminarse, por favor verifique') );
    
    //desactiamos unidades y subunidades
    $r = $this->db->query("UPDATE unidad SET activo = 0, fecha = now() WHERE cliente = '{$id}'");
    $r = $this->db->query("UPDATE subunidad SET activo = 0, fecha = now() WHERE cliente = '{$id}'");

    echo toJson(1, 'El Cliente se elimino correctamente');
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Clientes = new Clientes();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Clientes, $method) or die( 'Method not found' );

$Clientes->{$method}();//llama a la funcion existente