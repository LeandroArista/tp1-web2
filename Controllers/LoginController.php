<?php
include_once('./views/LoginView.php');
include_once('./Models/UsuariosModel.php');
class LoginController {

    private $view;
   
    private $model;

    public function __construct() {
        $this->view = new LoginView();
        $this->model= new UsuariosModel;
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verifyUser() {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $user = $this->model->getByNombreUsuario($nombre);
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
        $clave=password_hash($_POST['clave'],PASSWORD_DEFAULT );
        $this->model->insertarUsuario($_POST['nombre'],$_POST['mail'],$clave,false);
        $this->verifyUser();
        header('Location:'.BASE_URL);
    }

    public function register(){
        $this->view->showRegister();
    }
    public function getUserLogged(){
        if (!isset($_SESSION['id_usuario'])) {
            return null;
        }
        return $_SESSION['nombre'];

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

      public function checkAdmin() {
        if ($this->checkLogin()){
            if(!isset($_SESSION)){
                session_start();
                return false;
            }else{
                $usuario=$this->model->getUsuario($_SESSION['id_usuario']);
                if($usuario!=null && $usuario->administrador == true){
                    return true;
                }
                return false;
            }
        }
        return false;
      }    

      public function forgedPassword(){
           $this->view->displayForgedPassword();           
      }

      public function newPassword(){
        $user=$this->model->getUsuario($_POST['id_usuario']);
        if ($user!=null){
            $this->view->displayPassword($user);
          }
      }


    public function logout() {
        session_start();
        session_destroy();
        header('Location:'.BASE_URL);
    }
}