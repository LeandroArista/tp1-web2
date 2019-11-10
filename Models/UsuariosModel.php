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

  public function insertarUsuario($nombre,$mail,$clave,$administrador) {
    $query = $this->db->prepare("INSERT INTO usuarios(nombre,mail,clave,administrador) VALUES(?,?,?,?)");
    $query->execute(array($nombre,$mail,$clave,$administrador));
  }

  public function editarUsuario($id_usuario,$nombre,$mail,$clave,$administrador) {
    $sql = "UPDATE usuarios SET ".
    "nombre=:nombre,".
    "mail=:mail,".
    "clave=:clave,".
    "administrador=:administrador ".
    "WHERE id_usuario=:id_usuario";
    $query = $this->db->prepare($sql);
    $array=array(':nombre'=>$nombre,':mail'=>$mail,':clave'=>$clave,':administrador'=>$administrador,':id_usuario'=>$id_usuario);
    $query->execute($array);
  }

  public function borrarUsuario($id_usuario) {
    $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $query->execute(array($id_usuario));
  }
}