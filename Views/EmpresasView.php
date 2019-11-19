<?php
require_once('libs/Smarty.class.php');
require_once("./Controllers/LoginController.php");
class EmpresasView{

  function __construct(){
    $this->login = new LoginController();
  }

  public function displayEmpresas($empresas){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_empresas',$empresas);
    $isLogged = $this->login->checkLogin();
    $isadmin = $this->login->checkAdmin();
    $user=$this->login->getUserLogged();
    $smarty->assign('user',$user);
    $smarty->assign('admin',$isadmin);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_empresas.tpl');
  }

  public function displayEmpresa($empresa){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('Empresa',array($empresa));
    $isLogged = $this->login->checkLogin();
    $isadmin = $this->login->checkAdmin();
    $user=$this->login->getUserLogged();
    $smarty->assign('user',$user);
    $smarty->assign('admin',$isadmin);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_empresa.tpl');
  }

  public function editarEmpresa($empresa){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('Empresa',$empresa);
    $isLogged = $this->login->checkLogin();
    $isadmin = $this->login->checkAdmin();
    $user=$this->login->getUserLogged();
    $smarty->assign('user',$user);
    $smarty->assign('admin',$isadmin);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/form_empresa.tpl');
  }
}


?>