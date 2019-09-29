<?php
  require_once "./Models/UsuariosModel.php";
  //require_once "./Views/UsuariosView.php";

  class UsuariosController{
    private $model;
    private $view;

    public function __construc(){
      $this->model=new UsuariosModel();
      //$this->view = new UsuariosView();
    }

    public function getUsuarios(){
      $usuarios=$this->model->getUsuarios();
      //$this->view->displayUsuarios($usuarios);
    }

    public function getUsuario($id_usuario){
      $usuarios=$this->model->getUsuario($id_usuario);
      //$this->view->displayUsuario($usuarios);
    }

    public function insertarUsuario(){
      $this->model->insertarUsuario($_POST['nombre'],$_POST['mail'],$_POST['clave']);
      header("Location: ".BASE_URL);
    }

    public function editarUsuario($id_usuario){
      $this->model->editarUsuario($id_usuario,$_POST['nombre'],$_POST['mail'],$_POST['clave']);
      header("Location: ".BASE_URL);
    }

    public function borrarUsuario($id_usuario){
      $this->model->borrarUsuario($id_usuario);
      header("Location: ".BASE_URL);
    }
  }
?>