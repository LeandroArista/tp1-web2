<?php
class CohetesModel {
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localHost;'.'dbname=db_tpespecial;charset=utf8','root','');
  }

  public function getCohetes() {
    $sentencia = $this->db->prepare("SELECT * from cohetes");
    $sentencia->execute();
    $cohetes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $cohetes;
  }

  public function getCohete($id_cohete) {
    $sentencia = $this->db->prepare("SELECT * FROM cohetes WHERE id_cohete = ?");
    $sentencia->execute(array($id_cohete));
    $cohete = $sentencia->fetch(PDO::FETCH_OBJ);
    return $cohete;
  }

  public function insertarCohete($nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa) {
    $sentencia = $this->db->prepare("INSERT INTO cohetes(nombre,fecha_creacion,altura,diametro,masa,id_empresa) VALUES(?,?,?,?,?,?,?)");
    $sentencia->execute(array($nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa));
  }

  public function editarCohete($id_cohete,$nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa) {
    $sentencia = $this->db->prepare("UPDATE cohetes SET nombre = :nombre, fecha_creacion = :fecha_creacion,altura = :altura,diametro = :diametro,masa = :masa,id_empresa = :id_empresa WHERE id_cohete = :id_cohete ");
    $sentencia->execute(array('id_cohete'=>$id_cohete,'nombre'=>$nombre,'fecha_creacion'=>$fecha_creacion,'altura'=>$altura,'diametro'=>$diametro,'masa'=>$masa,'id_empresa'=>$id_empresa));
  }

  public function borrarCohete($id_cohete) {
    $sentencia = $this->db->prepare("DELETE FROM cohetes WHERE id_cohete = ?");
    $sentencia->execute(array($id_cohete));
  }

}