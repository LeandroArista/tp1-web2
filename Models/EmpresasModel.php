<?php
class EmpresasModel {
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  public function getEmpresas() {
    $query = $this->db->prepare('SELECT * FROM empresas');
    $query->execute();
    $empresas = $query->fetchAll(PDO::FETCH_OBJ);
    return $empresas;
  }

  public function getEmpresa($id_empresa) {
    $query = $this->db->prepare('SELECT * FROM empresas WHERE id_empresa = ?');
    $query->execute(array($id_empresa));
    $empresa = $query->fetch(PDO::FETCH_OBJ);
    return $empresa;
  }

  public function insertarEmpresa($nombre,$propietario,$pais,$fecha_fundacion) {
    $query = $this->db->prepare('INSERT INTO empresas(nombre,propietario,pais,fecha_fundacion) VALUES(?,?,?,?)');
    $query->execute(array($nombre,$propietario,$pais,$fecha_fundacion));
  }

  public function editarEmpresa($id_empresa,$nombre,$propietario,$pais,$fecha_fundacion) {
    $query = $this->db->prepare('UPDATE empresas SET nombre = :nombre, propietario = :propietario ,pais = :pais,fecha_fundacion = :fecha_fundacion WHERE id_empresa = :id_empresa');
    $query->execute(array('id_empresa'=>$id_empresa,'nombre'=>$nombre,'propietario'=>$propietario,'pais'=>$pais,'fecha_fundacion'=>$fecha_fundacion));
  }

  public function borrarEmpresa($id_empresa) {
    $query = $this->db->prepare('DELETE FROM empresas WHERE id_empresa = ?');
    $query->execute(array($id_empresa));
  }
}