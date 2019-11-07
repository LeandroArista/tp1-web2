<?php
include_once('./views/LoginView.php');
include_once('./Controllers/UsuariosController.php');
class LoginController {

    private $view;
   
    private $controller;

    public function __construct() {
        $this->view = new LoginView();
        $this->controller= new UsuariosController;
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verifyUser() {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $user = $this->controller->getByNombreUsuario($nombre);
        if (!empty($user)){ 
            $result= password_verify($clave, $user->clave);
            if (password_verify($clave, $user->clave)) {
                session_start();
                $_SESSION['id_usuario'] = $user->id_usuario;
                $_SESSION['nombre'] = $user->nombre;
                header('Location:'.BASE_URL);
            } else {
                $this->view->showLogin("Contraseña incorrecta");
            }
        }else   
            $this->view->showLogin("Usuario invalido");
    }
    public function saveRegister(){
        $this->controller->insertarUsuario();
        $this->verifyUser();
        header('Location:'.BASE_URL);
    }

    public function register(){
        $this->view->showRegister();
    }

    public function checkLogin() {
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['id_usuario'])) {
          return false;
        }elseif (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
          header("Location:".LOGOUT_URL);
          die();
        }else {
            $_SESSION["LAST_ACTIVITY"] = time();
            return true;
        }
      }    

    public function logout() {
        session_start();
        session_destroy();
        header('Location:'.BASE_URL);
    }
}