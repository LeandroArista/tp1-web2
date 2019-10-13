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
                $cohetesController = new CohetesController();
                $cohetesController->getCohetes();
                break;
            case "insertarcohete":
                $cohetesController = new CohetesController();
                $cohetesController->insertarCohete();
                break;
            case "borrarcohete":
                $cohetesController = new CohetesController();
                $cohetesController->borrarCohete($partesURL[1]);
                break;
            case "empresas":
                $empresasController = new EmpresasController();
                $empresasController->verEmpresas();
                break;
            case "verempresa":
                $empresasController = new EmpresasController();
                $empresasController->verEmpresa($partesURL[1]);
                break;
            case "editarempresa":
                $empresasController = new EmpresasController();
                $empresasController->editarEmpresa($partesURL[1]);
                break;
            case "updateempresa":
                $empresasController = new EmpresasController();
                $empresasController->updateEmpresa($partesURL[1]);
                break;
            case "insertarempresa":
                $empresasController = new EmpresasController();
                $empresasController->insertarEmpresa();
                break;
            case "borrarempresa":
                $empresasController = new EmpresasController();
                $empresasController->borrarEmpresa($partesURL[1]);
                break;
            default:
                home();
                break;
        }
    }   
}
?>