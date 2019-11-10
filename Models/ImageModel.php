<?php

class ImageModel {
    private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  public function getImagenes($id_cohete) {
    $query = $this->db->prepare('SELECT * FROM fotoscohetes WHERE id_cohete = ?');
    $query->execute(array($id_cohete));
    $images = $query->fetchAll(PDO::FETCH_OBJ);
    return $images;
  }

  public function insertarImagen($ruta,$id_cohete) {
    $query = $this->db->prepare('INSERT INTO fotoscohetes(ruta,id_cohete) VALUES(?,?)');
    $query->execute(array($ruta,$id_cohete));
  }

  public function getImagen($id_imagen){
    $query = $this->db->prepare('SELECT * FROM fotoscohetes WHERE id_imagen = ?');
    $query->execute(array($id_imagen));
    $image = $query->fetch(PDO::FETCH_OBJ);
    return $image;
  }

  public function removerImagen($id_imagen){
    $imagen= $this->getImagen($id_imagen);
    if($imagen!=null){
        unlink($imagen->ruta);
        $query = $this->db->prepare('DELETE FROM fotoscohetes WHERE id_imagen = ?');
        $query->execute(array($id_imagen));
    }

  }

  public function removerImagenes($id_cohete){
    $images= $this->getImagenes($id_cohete);
    foreach ($images as $image){
        unlink($image->ruta);
    }  
    $query = $this->db->prepare('DELETE FROM fotoscohetes WHERE id_cohete = ?');
    $query->execute(array($id_cohete));
  }
}