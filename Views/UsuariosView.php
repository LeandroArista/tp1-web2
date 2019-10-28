<?php
require_once('libs/Smarty.class.php');

class UsuariosView{

  function __construct(){

  }

  public function displayUsuarios($usuarios){
    $smarty= new Smarty();
    $smarty->assign('titulo','Mostrar Usuarios');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_usuarios',$usuarios);
    //$smarty->display('templates/ver_usuarios.tpl');
    

  }
}


?>