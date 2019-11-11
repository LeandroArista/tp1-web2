<?php
class ComentariosModel {
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  private function CometariosCohete($id_cohete,$sql){
    $query = $this->db->prepare($sql);
    $query->execute(array($id_cohete));
    $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
    return $comentarios;
  }

  public function get($id_comentario){
    $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
    $query->execute(array($id_comentario));
    $comentario = $query->fetch(PDO::FETCH_OBJ);
    return $comentario;
  }

  public function getCometariosCohete($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ?';
    return $this->CometariosCohete($id_cohete,$sql);
  }
  
  public function getCometariosSortByPrioridad($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ? ORDER BY prioriodad DESC';
    return $this->CometariosCohete($id_cohete,$sql);
  }

  public function getCometariosSortByFecha($id_cohete){
    $sql='SELECT * FROM comentarios WHERE id_cohete = ? ORDER BY fecha DESC';
    return $this->CometariosCohete($id_cohete,$sql);
  }

  public function insertarComentario($texto,$fecha,$puntaje,$id_usuario,$id_cohete) {
    $fechaformat = date('Y-m-d', strtotime($fecha));
    $query = $this->db->prepare('INSERT INTO comentarios(texto,fecha,puntaje,id_usuario,id_cohete) VALUES(?,?,?,?,?)');
    $query->execute(array($texto,$fechaformat,$puntaje,$id_usuario,$id_cohete));
    return $this->db->lastInsertId();
  }

  public function borrarComentario($id_comentario) {
    $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
    $query->execute(array($id_comentario));
  }
}