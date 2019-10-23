<?php
require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    public function __construct() {
       
    }

    public function showLogin($error = null) {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',null);
        $smarty->assign('titulo','IniciarSesión');
        $smarty->assign('error', $error);
        $smarty->display('templates/ver_login.tpl');
    }

    public function showRegister($error = null){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',null);
        $smarty->assign('titulo','Registrarse');
        $smarty->assign('error',$error);
        $smarty->display('templates/ver_register.tpl');
    }
}