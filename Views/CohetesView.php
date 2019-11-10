<?php
require_once('libs/Smarty.class.php');

class CohetesView{

  function __construct(){

  }

  public function displayCohetes($cohetes,$isLogged,$empresas,$sort,$isadmin){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Cohetes');
    $smarty->assign('sort',$sort);
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_cohetes',$cohetes);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->assign('logged',$isLogged);
    $smarty->assign('admin',$isadmin);
    $smarty->display('templates/ver_cohetes.tpl');
  }

  public function displayCohete($cohete,$isLogged,$images,$isadmin){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Mostrar Cohete');
    $smarty->assign('BASE_URL',BASE_URL);
    if ($images!=null)
      $smarty->assign('SelImg',$images[0]);
    else
      $smarty->assign('SelImg',0);
    $smarty->assign('imagenes',$images);
    $smarty->assign('cohete',$cohete);
    $smarty->assign('logged',$isLogged);
    $smarty->assign('admin',$isadmin);
    $smarty->display('templates/ver_cohete.tpl');
  }

  public function editarCohete($cohete,$empresas,$images,$isadmin){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Cohetes");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Editar Cohete');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('logged',true);
    $smarty->assign('Cohete',$cohete);
    $smarty->assign('lista_imagenes',$images);
    $smarty->assign('lista_empresas',$empresas);
    $smarty->assign('admin',$isadmin);
    $smarty->display('templates/form_cohete.tpl');
  }
}
