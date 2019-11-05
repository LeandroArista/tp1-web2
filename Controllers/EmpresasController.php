<?php
require_once "./Models/EmpresasModel.php";
require_once "./Views/EmpresasView.php";
require_once "./Controllers/LoginController.php";
require_once "./Models/CohetesModel.php";

class EmpresasController{
  private $model;
  private $view;
  private $login;
  private $CohetesModel;
  
  public function __construct() {
    $this->model = new EmpresasModel();
    $this->view = new EmpresasView();
    $this->login = new LoginController();
    $this->CohetesModel= new CohetesModel;
  }

  public function verEmpresas(){
    $isLogged = $this->login->checkLogin();
    $empresas=$this->model->getEmpresas();
    $this->view->displayEmpresas($empresas, $isLogged);
  }

  public function getEmpresa($id_empresa){
    $empresa=$this->model->getEmpresa($id_empresa);
    return $empresa;
  }
  public function getEmpresas(){
    $empresas=$this->model->getEmpresas();
    return $empresas;
  }

  public function verEmpresa($id_empresa){
    $isLogged = $this->login->checkLogin();
    $empresa=$this->model->getEmpresa($id_empresa);
    $this->view->displayEmpresa($empresa, $isLogged);
  }

  public function insertarEmpresa(){
    if ($this->login->checkLogin()){
      $fecha = date('Y-m-d', strtotime($_POST['fecha_fundacion']));
      $this->model->insertarEmpresa($_POST['nombre'],$_POST['propietario'],$_POST['pais'],$fecha);
    }
    header("Location:".BASE_URL);
  }
  public function updateEmpresa($id_empresa){
    if ($this->login->checkLogin()){  
      $fecha = date('Y-m-d', strtotime($_POST['fecha_fundacion']));
      $this->model->editarEmpresa($id_empresa,$_POST['nombre'],$_POST['propietario'],$_POST['pais'],$fecha);
    }
    header("Location:".BASE_URL."empresas");
  }

  public function editarEmpresa($id_empresa){
    $empresa=$this->getEmpresa($id_empresa);
    if($empresa!=null){
      if ($this->login->checkLogin()){
        $empresa->fecha_fundacion=date('Y-m-d', strtotime($empresa->fecha_fundacion));
        $this->view->editarEmpresa($empresa);
      }
    }
  }

  public function borrarEmpresa($id_empresa){
    $empresa=$this->getEmpresa($id_empresa);
    if($empresa!=null){
      if ($this->login->checkLogin()){
        $this->CohetesModel->borrarCohetes($id_empresa);
        $this->model->borrarEmpresa($id_empresa);
      }
    }
    header("Location:".BASE_URL."empresas");
  }
}