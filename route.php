<?php
require_once "Controllers/EmpresasController.php";
require_once "Controllers/CohetesController.php";
require_once "Controllers/LoginController.php";
require_once "Controllers/UsuariosController.php";
require_once "Views/IndexView.php";


define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("REGISTER_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');
define("LOGOUT_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("MENU",Array('Home'=>'home','Usuarios'=>'usuarios','Empresas'=>'empresas','Cohetes'=>'cohetes','Logout'=>'logout','Login'=>'login','Register'=>'register'));

$empresasController = new EmpresasController();
$cohetesController = new CohetesController();
$loginController = new LoginController();
$usuariosController = new usuariosController();
$index = new IndexView();

$action = $_GET['action'];
if($action == '') {
    $index->displayIndex();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        switch ($partesURL[0]) {
            case "home":
                $index->displayIndex($loginController->checkLogin());
            break;
            case "usuarios":
                if ($loginController->checkAdmin())
                $usuariosController->getUsuarios();
            break;
            case "unsetadmin":
                if ($loginController->checkAdmin())
                $usuariosController->unsetAdmin($partesURL[1]);
                break;
            case "setadmin":
                if ($loginController->checkAdmin())
                $usuariosController->setAdmin($partesURL[1]);
                break;
            case "borrarusuario":
                if ($loginController->checkAdmin())
                    $usuariosController->borrarUsuario($partesURL[1]);
                break;
            case "saveregister":
                $loginController->saveRegister();
                break;
            case "register":
                $loginController->register();
            break;
            case "login":
                $loginController->showLogin();
                break;
            case "verify":
                $loginController->verifyUser();
                break;
            case "logout":
                $loginController->logout();
            break;
            case "newpassword":
                $loginController->forgedPassword($partesURL[1]);
                break;
            case "cohetes":
                $cohetesController->getCohetes();
                break;
            case "insertarcohete":
                $cohetesController->insertarCohete();
                break;
            case "borrarcohete":
                $cohetesController->borrarCohete($partesURL[1]);
                break;
            case "editarcohete":
                $cohetesController->editarCohete($partesURL[1]);
                break;
            case "updatecohete":
                $cohetesController->updateCohete($partesURL[1]);
                break;
            case "vercohete":
                $cohetesController->getCohete($partesURL[1]);
                break;
            case "sortcohetes":
                $cohetesController->getSortCohetes();
                break;
            case "empresas":
                $empresasController->verEmpresas();
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
                $index->displayIndex();
                break;
        }
    }   
}
?>