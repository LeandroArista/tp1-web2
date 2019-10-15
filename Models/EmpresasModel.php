<?php
class EmpresasModel {
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  public function getEmpresas() {
    $sentencia = $this->db->prepare('SELECT * FROM empresas');
    $sentencia->execute();
    $empresas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $empresas;
  }

  public function getEmpresa($id_empresa) {
    $sentencia = $this->db->prepare('SELECT * FROM empresas WHERE id_empresa = ?');
    $sentencia->execute(array($id_empresa));
    $empresa = $sentencia->fetch(PDO::FETCH_OBJ);
    return $empresa;
  }

  public function insertarEmpresa($nombre,$propietario,$pais,$fecha_fundacion) {
    $sentencia = $this->db->prepare('INSERT INTO empresas(nombre,propietario,pais,fecha_fundacion) VALUES(?,?,?,?)');
    $sentencia->execute(array($nombre,$propietario,$pais,$fecha_fundacion));
  }

  public function editarEmpresa($id_empresa,$nombre,$propietario,$pais,$fecha_fundacion) {
    $sentencia = $this->db->prepare('UPDATE empresas SET nombre = :nombre, propietario = :propietario ,pais = :pais,fecha_fundacion = :fecha_fundacion WHERE id_empresa = :id_empresa');
    $sentencia->execute(array('id_empresa'=>$id_empresa,'nombre'=>$nombre,'propietario'=>$propietario,'pais'=>$pais,'fecha_fundacion'=>$fecha_fundacion));
  }

  public function borrarEmpresa($id_empresa) {
    $sentencia = $this->db->prepare('DELETE FROM empresas WHERE id_empresa = ?');
    $sentencia->execute(array($id_empresa));
  }
}