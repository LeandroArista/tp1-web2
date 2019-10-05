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

        // encontró un user con el nombre que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($clave, $user->clave)) {
            
            // INICIO LA SESSION Y LOGUEO AL USUARIO
            session_start();
            $_SESSION['id_usuario'] = $user->id_usuario;
            $_SESSION['nombre'] = $user->nombre;

            header('Location: ver');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }
    public function saveRegister(){
        $this->controller->insertarUsuario();
    }

    public function register(){
        $this->view->showRegister();
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . LOGIN);
    }
}