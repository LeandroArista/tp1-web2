<?php
require('libs/Smarty.class.php');

class EmpresasView{

  function __construct(){

  }

  public function displayEmpresas($empresas){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Empresas');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_empresas',$empresas);
    //$smarty->display('templates/ver_empresas.tpl');
    

  }
}


?>