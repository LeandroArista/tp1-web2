<?php
require_once "./Models/CohetesModel.php";
//require_once "./Views/CohetesView.php";

class CohetesController{
  private $model;
  private $view;

  public function __construc(){
    $this->model=new CohetesModel();
    //$this->view = new CohetesView();
  }

  public function getCohetes(){
    $cohetes=$this->model->getCohetes();
    //$this->view->display]Cohetes($cohetes);
  }

  public function getCohete($id_cohete){
    $cohete=$this->model->getCohete($id_cohete);
    //$this->view->displayCohetes($cohete);
  }

  public function insertarCohete(){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->insertarCohete($_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    header("Location:".BASE_URL);
  }

  public function editarCohete($id_cohete){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->editarCohete($id_cohete,$_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    header("Location:".BASE_URL);
  }

  public function borrarCohete($id_cohete){
    $this->model->borrarCohete($id_cohete);
    header("Location:".BASE_URL);
  }
}
?>