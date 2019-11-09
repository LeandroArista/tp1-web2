<?php
require_once "./Models/ImageModel.php";


class ImageController{

    private $model;

  public function __construct(){
    $this->model=new ImageModel();
  }

  public function insertarImagen(){
    $filePath = "img/" . uniqid() . "." . pathinfo($_FILES['imagen-cohete']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["tmp_name"], $filePath);
    if($_FILES['imagen-cohete']['type'] == "image/jpg" || $_FILES['imagen-cohete']['type'] == "image/jpeg" || $_FILES['imagen-cohete']['type'] == "image/png" || …) 
        $this->model->insertarImagen($_FILES['imagen-cohete']['tmp_name']);
    header("Location:".BASE_URL."cohetes");
  }
    