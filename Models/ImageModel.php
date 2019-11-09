<?php

class ImageModel {
    private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8','root', '');
  }

  public function getImagenes($id_cohete) {
    $query = $this->db->prepare('SELECT ruta FROM fotoscohetes WHERE id_cohete = ?');
    $query->execute(array($id_cohete));
    $images = $query->fetchAll(PDO::FETCH_OBJ);
    return $images;
  }

  public function insertarImagen($ruta,$id_cohete) {
    $query = $this->db->prepare('INSERT INTO fotoscohetes(ruta,id_cohete) VALUES(?,?)');
    $query->execute(array($ruta,$id_cohete));
  }