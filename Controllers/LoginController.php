<?php
include_once('./views/LoginView.php');
include_once('./Models/UsuariosModel.php');
include_once 'SendMail.php';
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

    private function logginUser($nombre,$clave){
        $user = $this->model->getByNombreUsuario($nombre);
        if (!empty($user)){ 
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

    public function verifyUser() {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $this->logginUser($nombre,$clave);
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
           $this->view->ForgedPassword();           
      }

      private function sendMail($mail,$clave){
        // ini_set( 'display_errors', 1 );
        // error_reporting( E_ALL );
        // $from = "leandroa_07@hotmail.com";
        // $to = "$mail";
        // $subject = "New Password SpaceRocket";
         $message = "Aqui esta su nueva clave: $clave por favor ingrese una clave nueva para mayor seguridad";
        // $headers = "From:" . $from;
        // mail($to,$subject,$message, $headers);
        // echo "mail enviado";
        newMail($mail,$message);
      }

      public function newPassword(){
        $user=$this->model->getByNombreUsuario($_POST['nombre']);
        if ($user!=null){
            $clave=random_int(10000,99999);
            $newclave=password_hash($clave,PASSWORD_DEFAULT );
            $this->model->editarUsuario($user->id_usuario,$user->nombre,$user->mail,$newclave,$user->administrador);
            $mensaje=$this->sendMail($user->mail,$clave);
            if($mensaje)
                $this->view->newPassword($user);
            else
                $this->view->displayForgedPassword("email invalido");    
          }else{
            $this->view->displayForgedPassword("nombre de Usuario invalido");
          }
      }

      public function updatePassword($id_usuario){
          $oldclave=$_POST['oldclave'];
          $newclave=$_POST['clave'];
          $usuario=$this->model->getUsuario($id_usuario);
          if (password_verify($oldclave, $usuario->clave)){
            $clave=password_hash($newclave,PASSWORD_DEFAULT );
            $this->model->editarUsuario($usuario->id_usuario,$usuario->nombre,$usuario->mail,$clave,$usuario->administrador);
            $this->logginUser($usuario->nombre,$_POST['clave']);//loggeo
        }else {
            $this->view->newPassword($usuario,"Contraseña incorrecta");
          }

      }

    public function logout() {
        session_start();
        session_destroy();
        header('Location:'.BASE_URL);
    }
}