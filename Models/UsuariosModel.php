<?php
class UsuariosModel {
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localHost;'.'dbname=db_tpespecial;charset=utf8','root','');
  }

  public function getUsuarios() {
    $sentencia = $this->db->prepare("SELECT * from usuarios");
    $sentencia->execute();
    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $usuarios;
  }

  public function getUsuario($id_usuario) {
    $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
    $sentencia->execute(array($id_usuario));
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
    return $usuario;
  }

  public function insertarUsuario($nombre,$mail,$clave) {
    $sentencia = $this->db->prepare("INSERT INTO usuarios(nombre,mail,clave) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$mail,$clave));
  }

  public function editarUsuario($id_usuario,$nombre,$mail,$clave) {
    $sentencia = $this->db->prepare("UPDATE usuarios SET nombre = :nombre, mail = :mail ,clave = :clave WHERE id_usuario = :id_usuario");
    $sentencia->execute(array('id_usuario'=>$id_usuario,'nombre'=>$nombre,'$mail'=>$mail,'clave'=>$clave));
  }

  public function borrarUsuario($id_usuario) {
    $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $sentencia->execute(array($id_usuario));
  }

}
?>