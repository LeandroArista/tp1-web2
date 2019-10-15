<?php
require_once('libs/Smarty.class.php');

class EmpresasView{

  function __construct(){

  }

  public function displayEmpresas($empresas, $isLogged){//action edit or insert if null default insert
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_empresas',$empresas);
    if (!$isLogged){
      $smarty->display('templates/ver_empresas.tpl');
    }else {
      $smarty->display('templates/ver_empresas_admin.tpl');
    }
  }

  public function displayEmpresa($empresa, $isLogged){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('Empresa',array($empresa));
    if (!$isLogged){
      $smarty->display('templates/ver_empresa.tpl');
    }else{
      $smarty->display('templates/ver_empresa_admin.tpl');
    }
  }

  public function editarEmpresa($empresa){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('Empresa',$empresa);
    $smarty->display('templates/form_empresa.tpl');
  }
}


?>