<?php
require_once "Controllers/EmpresasController.php";
require_once "Controllers/CohetesController.php";
require_once "Controllers/UsuariosController.php";
require_once "php/script.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$cohetesController = new CohetesController();

$action = $_GET['action'];
if($action == '') {
  home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        switch ($partesURL[0]) {
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
            case "usuarios" :
                $usuariosController = new UsuariosController();
                $usuariosController->getUsuarios();
                break;
            case "insertarusuario":
                $usuariosController = new UsuariosController();
                $usuariosController->insertarUsuario();
                break;
            case "borrarusuario":
                $usuariosController = new UsuariosController();
                $usuariosController->borrarUsuario($partesURL[1]);
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
        }
    }
    
}



?>