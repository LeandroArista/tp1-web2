<?php
require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    public function showLogin($error = null) {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/ver_login.tpl');
    }

    public function showRegister(){
        $this->smarty->assign('titulo', 'Registrarse');
        $this->smarty->display('templates/ver_register.tpl');
    }

}