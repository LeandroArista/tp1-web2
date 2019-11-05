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
    $this->view->displayCohetes($cohetes,$isLogged,$empresas,false);
  }

  public function getSortCohetes(){
    $isLogged = $this->login->checkLogin();
    $cohetes=$this->model->getSortCohetes();
    $empresas=$this->empresasController->getEmpresas();
    $this->view->displayCohetes($cohetes,$isLogged,$empresas,true);
    
  }

  public function getCohete($id_cohete){
    $isLogged = $this->login->checkLogin();
    $cohete=$this->model->getCohete($id_cohete);
    $empresas=$this->empresasController->getEmpresas();
    $this->view->displayCohete($cohete,$isLogged,$empresas);
  }
  public function getCoheteinfo($id_cohete){
    return $this->model->getCohete($id_cohete);
  }

  public function insertarCohete(){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->insertarCohete($_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    header("Location:".BASE_URL."cohetes");
  }

  public function updateCohete($id_cohete){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->editarCohete($id_cohete,$_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    header("Location:".BASE_URL."cohetes");
  }

  public function editarCohete($id_cohete){
    $cohete=$this->getCoheteinfo($id_cohete);
    if($cohete!=null){
      if ($this->login->checkLogin()){
        $cohete->fecha_creacion=date('Y-m-d', strtotime($cohete->fecha_creacion));
        $empresas=$this->empresasController->getEmpresas();
        $this->view->editarCohete($cohete,$empresas);
      }
    }
  }

  public function borrarCohete($id_cohete){
    $cohete=$this->getCoheteinfo($id_cohete);
    if($cohete!=null){
      if ($this->login->checkLogin()){
        $this->model->borrarCohete($id_cohete);
      }
    }
    header("Location:".BASE_URL."cohetes");
  }

  public function borrarCohetes($id_empresa){
    $empresa=$this->empresasController->getEmpresa($id_empresa);
    if($empresa!=null)
      if ($this->login->checkLogin()){
        $this->model->borrarCohetes($id_empresa);
      }
    header("Location:".BASE_URL."cohetes");
  }
}
?>