<?php
require_once('libs/Smarty.class.php');

class CohetesView{

  function __construct(){

  }

  public function displayCohetes($cohetes){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Cohetes');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',$cohetes);
    //$smarty->display('templates/ver_cohetes.tpl');
  }
}


?>