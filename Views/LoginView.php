<?php
require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    public function __construct() {
       
    }

    public function showLogin($error = null) {
        $smarty = new Smarty();
        $smarty->assign('SelMenu', "Login");
        $smarty->assign('MENU', MENU);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',false);
        $smarty->assign('admin',false);
        $smarty->assign('titulo','IniciarSesión');
        $smarty->assign('error', $error);
        $smarty->display('templates/ver_login.tpl');
    }

    public function showRegister($error = null){
        $smarty = new Smarty();
        $smarty->assign('SelMenu', "Register");
        $smarty->assign('MENU', MENU);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',false);
        $smarty->assign('admin',false);
        $smarty->assign('titulo','Registrarse');
        $smarty->assign('error',$error);
        $smarty->display('templates/ver_register.tpl');
    }
    public function newPassword($usuario,$error = null){
        $smarty = new Smarty();
        $smarty->assign('SelMenu', "Login");
        $smarty->assign('MENU', MENU);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',false);
        $smarty->assign('admin',false);
        $smarty->assign('usuario',$usuario);
        $smarty->assign('titulo','Cambio Contraseña');
        $smarty->assign('error',$error);
        $smarty->display('templates/form-Password.tpl');
    }
    public function ForgedPassword($error = null){
        $smarty = new Smarty();
        $smarty->assign('SelMenu', "Login");
        $smarty->assign('MENU', MENU);
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('logged',false);
        $smarty->assign('admin',false);
        $smarty->assign('titulo','Contraseña perdida');
        $smarty->assign('error',$error);
        $smarty->display('templates/forgedpassword.tpl');
    }
}