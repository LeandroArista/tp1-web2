<?php
require_once('libs/Smarty.class.php');

class CohetesView{

  function __construct(){

  }

  public function displayCohetes($cohetes,$isLogged,$empresas,$sort){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Cohetes');
    $smarty->assign('sort',$sort);
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',$cohetes);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_cohetes.tpl');
  }

  public function displayCohete($cohetes,$isLogged){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Cohete');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',array($cohetes));
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_cohete.tpl');
  }

  public function editarCohete($cohete,$empresas){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Editar Cohete');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('logged',true);
    $smarty->assign('Cohete',$cohete);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->display('templates/form_cohete.tpl');
  }
}
