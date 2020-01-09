<?php
session_start();

! empty( $_SESSION['usuario_comedor'] ) or die('Script not allowed SESSION');//verificamos que existe la sesion

define('KEY', 'JACE');//varibale para mis includes, requires

require "../../db/db.php";

class Tiempo{

  private $db;

  public function __construct(){
    global $db;
    $this->db = $db; 
  }

  public function getBases(){

    $r = $this->db->query("SELECT * FROM tiempo");
    $rows = [];
    while( $rows[] = $r->fetch_object() );
    array_pop($rows);
    echo json_encode($rows);
  }

  public function getBase(){
    $id = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT) or die( toJson(0, 'El tiempo es desconocida o invalido') );
    $r = $this->db->query("SELECT * FROM tiempo WHERE idTiempo = '{$id}' LIMIT 1");

    $this->db->affected_rows > 0 or die( toJson(0, 'El tiempo solicitado no existe') );

    $row = $r->fetch_object();
    echo json_encode($row);
  }

  public function addBase(){
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre del tiempo es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("INSERT INTO tiempo(descripcion, fecha, activo) VALUES ('{$nombre}', now(), 1)");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al guardar el tiempo, por favor reintente') );

    echo toJson(1, "El tiempo {$nombre} se guardo correctamente");

  }


  public function editBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die( toJson(0, 'Error interno, intente nuevamente') );
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) or die( toJson(0, 'El nombre de El tiempo es invalido') );

    $nombre = strtoupper($nombre);

    $this->db->query("UPDATE tiempo SET descripcion = '{$nombre}', fecha =  now() WHERE idTiempo = '{$id}'");

    $this->db->affected_rows > 0 or die( toJson(0, 'Error al modificar El tiempo, por favor reintente') );

    echo toJson(1, "El tiempo {$nombre} se modifico correctamente");

  }

  public function delBase(){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) or die( toJson(0, 'El tiempo es desconocido o invalido') );
    $r = $this->db->query("DELETE FROM tiempo WHERE idTiempo = '{$id}'");
    $this->db->affected_rows > 0 or die( toJson(0, 'El tiempo solicitado no existe o no puedo eliminarse, por favor verifique') );
    echo toJson(1, 'El tiempo se elimino correctamente');
  }

  public function __destruct(){
    $this->db->close();
  }


}

$Tiempo = new Tiempo();

$method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);

method_exists($Tiempo, $method) or die( 'Method not found' );

$Tiempo->{$method}();//llama a la funcion existente