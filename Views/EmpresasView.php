<?php
require_once('libs/Smarty.class.php');

class EmpresasView{

  function __construct(){

  }

  public function displayEmpresas($empresas, $isLogged){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_empresas.tpl');
  }

  public function displayEmpresa($empresa, $isLogged){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('Empresa',array($empresa));
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_empresa.tpl');
  }

  public function editarEmpresa($empresa){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('logged',true);
    $smarty->assign('Empresa',$empresa);
    $smarty->display('templates/form_empresa.tpl');
  }
}


?>