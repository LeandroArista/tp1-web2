<?php
require_once('libs/Smarty.class.php');

class UsuariosView{

  function __construct(){

  }
  public function displayUsuarios($usuarios, $isLogged,$admin){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Empresas");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Usuarios');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_usuarios',$usuarios);
    $smarty->assign('logged',$isLogged);
    $smarty->assign('admin',$admin);
    $smarty->display('templates/ver_usuarios.tpl');
  }
}