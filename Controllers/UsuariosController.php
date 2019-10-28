<?php
  require_once "./Models/UsuariosModel.php";
  require_once "./Views/UsuariosView.php";

  class UsuariosController{
    private $model;
    private $view;

    public function __construct(){
      $this->model = new UsuariosModel();      
      $this->view = new UsuariosView();
    }

    public function getUsuarios(){
      $usuarios=$this->model->getUsuarios();
      $this->view->displayUsuarios($usuarios);
    }

    public function getUsuario($id_usuario){
      $usuarios=$this->model->getUsuario($id_usuario);
      $this->view->displayUsuario($usuarios);
    }

    public function getByNombreUsuario($nombre){
      $usuario=$this->model->getByNombreUsuario($nombre);
      return $usuario;
    }

    public function insertarUsuario(){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $this->model->insertarUsuario($_POST['nombre'],$_POST['mail'],$clave);
      header("Location:".BASE_URL);
    }

    public function editarUsuario($id_usuario){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $this->model->editarUsuario($id_usuario,$_POST['nombre'],$_POST['mail'],$clave);
      header("Location:".BASE_URL);
    }

    public function borrarUsuario($id_usuario){
      $this->model->borrarUsuario($id_usuario);
      header("Location:".BASE_URL);
    }
  }