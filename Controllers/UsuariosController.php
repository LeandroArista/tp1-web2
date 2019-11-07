<?php
  require_once "./Models/UsuariosModel.php";
  require_once "./Views/UsuariosView.php";
  class UsuariosController{
    private $model;
    private $view;

    public function __construct(){
      $this->model = new UsuariosModel();      
    }

    public function getUsuarios(){
      $usuarios=$this->model->getUsuarios();
      $this->view->displayUsuarios();
    }

    public function getUsuario($id_usuario){
      $usuario=$this->model->getUsuario($id_usuario);
      return $usuario;
    }

    public function getByNombreUsuario($nombre){
      $usuario=$this->model->getByNombreUsuario($nombre);
      return $usuario;
    }

    private function setAdministrador($value){
      $usuario= $this->model->getUsuario($id_usuario);
      if($usuario!=null)
        $this->model->editarUsuario($id_usuario,$usuario->nombre,$usuario->mail,$usuario->clave,$value);
    }

    public function setAdmin(){
      $this->setAdministrador(true);
    }

    public function unsetAdmin(){
      $this->setAdministrador(false);
    }

    public function insertarUsuario(){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $this->model->insertarUsuario($_POST['nombre'],$_POST['mail'],$clave,false);
    }

    public function editarUsuario($id_usuario){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $usuario= $this->model->getUsuario($id_usuario);
      if($usuario!=null)
        $this->model->editarUsuario($id_usuario,$_POST['nombre'],$_POST['mail'],$clave,$usuario->admin);
    }

    public function borrarUsuario($id_usuario){
      $this->model->borrarUsuario($id_usuario);
    }
  }