<?php
require_once('libs/Smarty.class.php');
require_once("./Controllers/LoginController.php");
class IndexView{
  private $login;
  function __construct(){
    $this->login = new LoginController();
  }

  public function displayIndex(){
    $smarty= new Smarty();
    $smarty->assign('SelMenu', "Home");
    $smarty->assign('MENU', MENU);
    $smarty->assign('titulo','SpaceRocket');
    $smarty->assign('BASE_URL',BASE_URL);
    $isLogged = $this->login->checkLogin();
    $isadmin = $this->login->checkAdmin();
    $user=$this->login->getUserLogged();
    $smarty->assign('user',$user);
    $smarty->assign('admin',$isadmin);
    $smarty->assign('logged',$isLogged);
    $smarty->display('templates/index.tpl');
  }
}
