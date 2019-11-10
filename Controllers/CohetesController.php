<?php
require_once "./Models/CohetesModel.php";
require_once "./Views/CohetesView.php";
require_once "./Controllers/LoginController.php";
require_once "./Controllers/EmpresasController.php";
require_once "./Controllers/ImageController.php";

class CohetesController{
  private $model;
  private $view;
  private $login;
  private $empresaController;
  private $image;

  public function __construct(){
    $this->model=new CohetesModel();
    $this->view = new CohetesView();
    $this->login = new LoginController();
    $this->empresasController = new EmpresasController();
    $this->image= new Imagecontroller();
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
    $images=$this->image->getImagenes($id_cohete);
    $this->view->displayCohete($cohete,$isLogged,$images);
  }
  public function getCoheteinfo($id_cohete){
    return $this->model->getCohete($id_cohete);
  }

  public function insertarCohete(){
    $fecha = date('Y-m-d', strtotime($_POST['fecha_creacion']));
    $this->model->insertarCohete($_POST['nombre'],$fecha,$_POST['altura'],$_POST['diametro'],$_POST['masa'],$_POST['id_empresa']);
    $cohete=$this->model->getCoheteByName($_POST['nombre']);
    if($cohete!=null){
      $this->image->insertarImagen($cohete->id_cohete);
    }
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
        $this->image->removerImagenes($id_cohete);
      }
    }
    header("Location:".BASE_URL."cohetes");
  }

  public function borrarCohetes($id_empresa){
    $empresa=$this->empresasController->getEmpresa($id_empresa);
    if($empresa!=null)
      if ($this->login->checkLogin()){
        $cohetes=$this->model->getCohetesByEmpresa($id_empresa);
        foreach($cohetes as $cohete){
          $this->image->removerImagenes($cohete->id_cohete);
        }
        $this->model->borrarCohetes($id_empresa);
      }
    header("Location:".BASE_URL."cohetes");
  }

}
?>