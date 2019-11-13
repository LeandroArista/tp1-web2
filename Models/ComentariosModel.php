<?php
class ComentariosModel {
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  public function get($id_comentario){
    $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
    $query->execute(array($id_comentario));
    $comentario = $query->fetch(PDO::FETCH_OBJ);
    return $comentario;
  }

  private function ComentariosCohete($id_cohete,$sql){
    $query = $this->db->prepare($sql);
    $query->execute(array($id_cohete));
    $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
    return $comentarios;
  }

  public function getComentarios($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ?';
    return $this->ComentariosCohete($id_cohete,$sql);
  }
  
  public function getComentariosByPuntaje($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ? ORDER BY puntaje DESC';
    return $this->ComentariosCohete($id_cohete,$sql);
  }

  public function getComentariosByFecha($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ? ORDER BY fecha DESC';
    return $this->ComentariosCohete($id_cohete,$sql);
  }

  public function insertarComentario($texto,$puntaje,$id_usuario,$id_cohete) {
    $query = $this->db->prepare('INSERT INTO comentarios(texto,fecha,puntaje,id_usuario,id_cohete) VALUES(?,NOW(),?,?,?)');
    $query->execute(array($texto,$puntaje,$id_usuario,$id_cohete));
    return $this->db->lastInsertId();
  }

  public function borrarComentario($id_comentario) {
    $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
    $query->execute(array($id_comentario));
  }
}