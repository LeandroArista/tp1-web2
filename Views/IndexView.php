<?php
require_once('libs/Smarty.class.php');

class IndexView{

  function __construct(){

  }

  public function displayIndex(){
    $smarty= new Smarty();
    $smarty->assign('titulo','SpaceRocket');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->display('templates/index.tpl');
  }
}


?>