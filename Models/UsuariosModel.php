<?php
class UsuariosModel {
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localHost;'.'dbname=db_tpespecial;charset=utf8','root','');
  }

  public function getUsuarios() {
    $query = $this->db->prepare("SELECT * from usuarios");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
    return $usuarios;
  }
	public function getByNombreUsuario($nombre) {
    $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
    $query->execute(array($nombre));
    $usuario = $query->fetch(PDO::FETCH_OBJ);
    return $usuario;
  }

  public function getUsuario($id_usuario) {
    $query = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
    $query->execute(array($id_usuario));
    $usuario = $query->fetch(PDO::FETCH_OBJ);
    return $usuario;
  }

  public function insertarUsuario($nombre,$mail,$clave) {
    $query = $this->db->prepare("INSERT INTO usuarios(nombre,mail,clave) VALUES(?,?,?)");
    $query->execute(array($nombre,$mail,$clave));
  }

  public function editarUsuario($id_usuario,$nombre,$mail,$clave) {
    $query = $this->db->prepare("UPDATE usuarios SET nombre = :nombre, mail = :mail ,clave = :clave WHERE id_usuario = :id_usuario");
    $query->execute(array('id_usuario'=>$id_usuario,'nombre'=>$nombre,'$mail'=>$mail,'clave'=>$clave));
  }

  public function borrarUsuario($id_usuario) {
    $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $query->execute(array($id_usuario));
  }
}