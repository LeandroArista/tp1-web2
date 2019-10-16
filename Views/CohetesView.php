<?php
require_once('libs/Smarty.class.php');

class CohetesView{

  function __construct(){

  }

  public function displayCohetes($cohetes,$isLogged,$empresas){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Cohetes');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',$cohetes);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_cohetes.tpl');
  }

  public function displayCohete($cohetes,$isLogged){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Cohetes');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',array($cohetes));
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_cohete.tpl');
  }
}


?>