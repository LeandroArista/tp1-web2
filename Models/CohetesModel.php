<?php
class CohetesModel {
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localHost;'.'dbname=db_tpespecial;charset=utf8','root','');
  }

  public function getCohetes() {
    $query = $this->db->prepare("SELECT * from cohetes");
    $query->execute();
    $cohetes = $query->fetchAll(PDO::FETCH_OBJ);
    return $cohetes;
  }

  public function getSortCohetes() {
    $query = $this->db->prepare("SELECT * from cohetes ORDER BY (id_empresa) DESC");
    $query->execute();
    $cohetes = $query->fetchAll(PDO::FETCH_OBJ);
    return $cohetes;
  }

  public function getCohete($id_cohete) {
    $query = $this->db->prepare("SELECT c.id_cohete,c.nombre,c.fecha_creacion,c.altura,c.diametro,c.masa,e.nombre AS empresa,e.propietario,e.pais FROM cohetes AS c INNER JOIN empresas AS e ON c.id_empresa=e.id_empresa WHERE c.id_cohete = ?");
    $query->execute(array($id_cohete));
    $cohete = $query->fetch(PDO::FETCH_OBJ);
    return $cohete;
  }

  public function getCoheteByName($nombre){
    $query = $this->db->prepare("SELECT * FROM cohetes WHERE nombre = ?");
    $query->execute(array($nombre));
    $cohete = $query->fetch(PDO::FETCH_OBJ);
    return $cohete;
  }
  public function getCohetesByEmpresa($id_empresa){
    $query = $this->db->prepare("SELECT c.id_cohete,c.nombre,c.fecha_creacion,c.altura,c.diametro,c.masa,e.nombre AS empresa,e.propietario,e.pais FROM cohetes AS c INNER JOIN empresas AS e ON c.id_empresa=e.id_empresa WHERE e.id_empresa = ?");
    $query->execute(array($id_empresa));
    $cohetes = $query->fetchAll(PDO::FETCH_OBJ);
    return $cohetes;
  }

  public function insertarCohete($nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa) {
    $query = $this->db->prepare("INSERT INTO cohetes(nombre,fecha_creacion,altura,diametro,masa,id_empresa) VALUES(?,?,?,?,?,?)");
    $query->execute(array($nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa));
  }

  public function editarCohete($id_cohete,$nombre,$fecha_creacion,$altura,$diametro,$masa,$id_empresa) {
    $query = $this->db->prepare("UPDATE cohetes SET nombre = :nombre, fecha_creacion = :fecha_creacion,altura = :altura,diametro = :diametro,masa = :masa,id_empresa = :id_empresa WHERE id_cohete = :id_cohete ");
    $query->execute(array('id_cohete'=>$id_cohete,'nombre'=>$nombre,'fecha_creacion'=>$fecha_creacion,'altura'=>$altura,'diametro'=>$diametro,'masa'=>$masa,'id_empresa'=>$id_empresa));
  }

  public function borrarCohete($id_cohete) {
    $query = $this->db->prepare("DELETE FROM cohetes WHERE id_cohete = ?");
    $query->execute(array($id_cohete));
  }
  public function borrarCohetes($id_empresa) {
    $query = $this->db->prepare("DELETE FROM cohetes WHERE id_empresa = ?");
    $query->execute(array($id_empresa));
  }
}