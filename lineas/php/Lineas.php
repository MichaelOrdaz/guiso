<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Lineas{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getBases(){

    $r = $this->db->query("SELECT * FROM linea");
    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo json_encode($rows);
  }

  public function getBase(){
    $id = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT) or die( toJson(0, 'La linea es desconocida o invalido') );
    $r = $this->db->query("SELECT * FROM linea WHERE idLinea = '{$id}' LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'La linea solicitado no existe') );

    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addBase(){
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre dLa linea es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("INSERT INTO linea(descripcion, fecha, activo) VALUES ('{$nombre}', now(), 1)");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar La linea, por favor reintente') );

    echo toJson(1, "La linea {$nombre} se guardo correctamente");

  }


  public function editBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'Error interno, intente nuevamente') );
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre de La linea es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("UPDATE linea SET descripcion = '{$nombre}', fecha =  now() WHERE idLinea = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al modificar La linea, por favor reintente') );

    echo toJson(1, "La linea {$nombre} se modifico correctamente");

  }

  public function delBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'La linea es desconocido o invalido') );
    $r = $this->db->query("DELETE FROM linea WHERE idLinea = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'La linea solicitado no existe o no puedo eliminarse, por favor verifique') );
    echo toJson(1, 'La linea se elimino correctamente');
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Lineas = new Lineas();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Lineas, $method) or die( 'Method not found' );

$Lineas->{$method}();//llama a la funcion existente