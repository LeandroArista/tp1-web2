<?php
require_once "./Models/EmpresasModel.php";
require_once "./Views/EmpresasView.php";

class EmpresasController{
  private $model;
  private $view;
  
  public function __construct() {
    $this->model = new EmpresasModel();
    $this->view = new EmpresasView();
  }

  public function verEmpresas(){
    $empresas=$this->model->getEmpresas();
    $this->view->displayEmpresas($empresas);
  }

  public function getEmpresa($id_empresa){
    $empresa=$this->model->getEmpresa($id_empresa);
    return $empresa;
  }
  
  public function verEmpresa($id_empresa){
    $empresa=$this->model->getEmpresa($id_empresa);
    $this->view->displayEmpresa($empresa);
  }

  public function insertarEmpresa(){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_fundacion']));
    $this->model->insertarEmpresa($_POST['nombre'],$_POST['propietario'],$_POST['pais'],$fecha);
    header("Location: ".BASE_URL);
  }
  public function updateEmpresa($id_empresa){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_fundacion']));
    $this->model->editarEmpresa($id_empresa,$_POST['nombre'],$_POST['propietario'],$_POST['pais'],$fecha);
    header("Location: ".BASE_URL);
  }

  public function editarEmpresa($id_empresa){///de donde traigo los datos de la vista?
    $empresa=getEmpresa($id_empresa);
    $empresa->fecha_fundacion=date('Y-m-d', strtotime($empresa->fecha_fundacion));
    $this->view->editarEmpresa($empresa);
  }

  public function borrarEmpresa($id_empresa){
    $this->model->borrarEmpresa($id_empresa);
    header("Location: ".BASE_URL);
  }
}
?>