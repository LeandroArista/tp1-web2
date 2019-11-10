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
      $usuario=$this->model->getUsuario($id_usuario);
      return $usuario;
    }

    public function getByNombreUsuario($nombre){
      $usuario=$this->model->getByNombreUsuario($nombre);
      return $usuario;
    }

    public function isAdmin($id_usuario){
        $usuario=$this->getUsuario($id_usuario);
        if($usuario!=null && $usuario->administrador == true)
          return true;
        return false;
    }

    private function setAdministrador($id_usuario,$value){
      $usuario= $this->model->getUsuario($id_usuario);
      if($usuario!=null ){
        $this->model->editarUsuario($id_usuario,$usuario->nombre,$usuario->mail,$usuario->clave,$value);
      }
      header("Location:".BASE_URL."usuarios");
    }

    public function setAdmin($id_usuario){
      $this->setAdministrador($id_usuario,true);
    }

    public function unsetAdmin($id_usuario){
      $this->setAdministrador($id_usuario,false);
    }

    public function insertarUsuario(){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $this->model->insertarUsuario($_POST['nombre'],$_POST['mail'],$clave,false);
    }

    public function editarUsuario($id_usuario){
      $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
      $usuario= $this->model->getUsuario($id_usuario);
      if($usuario!=null)
        $this->model->editarUsuario($id_usuario,$_POST['nombre'],$_POST['mail'],$clave,$usuario->administrador);
    }

    public function borrarUsuario($id_usuario){
      $usuario= $this->model->getUsuario($id_usuario);
      if($usuario!=null){
        $this->model->borrarUsuario($id_usuario);
      }
      header("Location:".BASE_URL."usuarios");
    }
  }