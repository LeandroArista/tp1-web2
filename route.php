<?php
require_once "Controllers/EmpresasController.php";
require_once "Controllers/CohetesController.php";
require_once "Controllers/UsuariosController.php";
require_once "php/script.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("REGISTER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');

$cohetesController = new CohetesController();
$empresasController = new EmpresasController();
$loginController = new LoginController();
$action = $_GET['action'];
if($action == '') {
  home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        switch ($partesURL[0]) {
            case "home":
                home();
            break;
            case "saveregister":
                $loginController->saveRegister();
                break;
            case "register":
                $loginController->register();
            break;
            case 'login':
                $loginController->showLogin();
                break;
            case 'verify':
                $loginController->verifyUser();
                break;
            case 'logout'://new controller por cada case?
                $loginController->logout();
            break;
            case "cohetes" :
                $cohetesController->getCohetes();
                break;
            case "insertarcohete":
                $cohetesController->insertarCohete();
                break;
            case "borrarcohete":
                $cohetesController->borrarCohete($partesURL[1]);
                break;
            case "empresas":
                $empresasController->getEmpresas();
                break;
            case "verempresa":
                $empresasController->verEmpresa($partesURL[1]);
                break;
            case "editarempresa":
                $empresasController->editarEmpresa($partesURL[1]);
                break;
            case "updateempresa":
            $empresasController->updateEmpresa($partesURL[1]);
                break;
            case "insertarempresa":
                $empresasController->insertarEmpresa();
                break;
            case "borrarempresa":
                $empresasController->borrarEmpresa($partesURL[1]);
                break;
            default:
                home();
                break;
        }
    }   
}
?>