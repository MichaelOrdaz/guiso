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