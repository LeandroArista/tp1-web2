<?php
require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    public function __construct() {
       
    }

    public function showLogin($error = null) {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('titulo','IniciarSesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/ver_login.tpl');
    }

    public function showRegister($error = null){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('titulo','Registrarse');
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/ver_register.tpl');
    }
}