<?php
require_once "Controllers/EmpresasController.php";
require_once "Controllers/CohetesController.php";
require_once "Controllers/UsuariosController.php";
require_once "script.php"


$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$cohetesController = new CohetesController();
$empresasController = new EmpresasController();
$usuariosController = new UsuariosController();

if($action == '') {
  home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        switch ($partesURL[0]) {
            case "cohetes" :
                $cohetesController->getCohetes();
                break;
            case "insertarcohete":
                $cohetesController->insertarCohete();
                break;
            case "borrarcohete":
                $cohetesController->borrarCohete($partesURL[1]);
                break;
            case "usuarios" :
                $usuariosController->getUsuarios();
                break;
            case "insertarusuario":
                $usuariosController->insertarUsuario();
                break;
            case "borrarusuario":
                $usuariosController->borrarUsuario($partesURL[1]);
                break;
            case "empresas":
                $empresasController->getEmpresas();
                break;
            case "insertarempresa":
                $empresasController->insertarEmpresa();
                break;
            case "borrarempresa":
                $empresasController->borrarEmpresa($partesURL[1]);
                break;
            default:
                home();
        }
    }
    
}



?>