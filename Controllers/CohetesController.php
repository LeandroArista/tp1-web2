<?php
require_once "./Models/CohetesModel.php";
require_once "./Views/CohetesView.php";
require_once "./Controllers/LoginController.php";
require_once "./Controllers/EmpresasController.php";

class CohetesController{
  private $model;
  private $view;
  private $login;
  private $empresaController;

  public function __construct(){
    $this->model=new CohetesModel();
    $this->view = new CohetesView();
    $this->login = new LoginController();
    $this->empresasController = new EmpresasController();
  }

  public function getCohetes(){
    $isLogged = $this->login->checkLogin();
    $cohetes=$this->model->getCohetes();
    $empresas=$this->empresasController->getEmpresas();
    $this->view->displayCohetes($cohetes,$isLogged,$empresas);
  }

  public function getCohete($id_cohete){
    $isLogged = $this->login->checkLogin();
    $cohete=$this->model->getCohete($id_cohete);
    $empresas=$this->empresasController->getEmpresas();
    $this->view->displayCohetes($cohete,$isLogged,$empresas);
  }

  public function insertarCohete(){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->insertarCohete($_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    //header("Location:".BASE_URL."cohetes");
  }

  public function editarCohete($id_cohete){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->editarCohete($id_cohete,$_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    header("Location:".BASE_URL."cohetes");
  }

  public function borrarCohete($id_cohete){
    $this->model->borrarCohete($id_cohete);
    header("Location:".BASE_URL."cohetes");
  }
}
?>