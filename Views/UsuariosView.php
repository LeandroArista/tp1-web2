<?php
require_once('libs/Smarty.class.php');
require_once("./Controllers/LoginController.php");
class UsuariosView{

  function __construct(){
    $this->login = new LoginController();
  }
  public function displayUsuarios($usuarios){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Usuarios");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','Usuarios');
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('lista_usuarios',$usuarios);
    $isLogged = $this->login->checkLogin();
    $isadmin = $this->login->checkAdmin();
    $smarty->assign('admin',$isadmin);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/ver_usuarios.tpl');
  }
}