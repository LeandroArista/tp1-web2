<?php
require_once "Controllers/EmpresasController.php";
require_once "Controllers/CohetesController.php";
require_once "Controllers/LoginController.php";
require_once "Views/IndexView.php";
require_once "Router.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("REGISTER_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');
define("LOGOUT_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("MENU",Array('Home'=>'home','Empresas'=>'empresas','Cohetes'=>'cohetes','Logout'=>'logout','Login'=>'login','Register'=>'register'));

$resource = $_GET["action"];
// método utilizado
$method = $_SERVER["REQUEST_METHOD"];
// instancia el router
$router = new Router();
// arma la tabla de ruteo
$router->addRoute("saveregister", "POST", "LoginController", "saveRegister");
$router->addRoute("register", "GET", "LoginController", "register");
$router->addRoute("login", "GET", "LoginController", "showLogin");
$router->addRoute("verify", "POST", "LoginController", "verifyUser");
$router->addRoute("logout", "GET", "LoginController", "logout");
$router->addRoute("cohetes", "GET", "CohetesController", "getCohetes");
$router->addRoute("insertarcohete", "POST", "CohetesController", "insertarCohete");
$router->addRoute("borrarcohete", "DELETE", "CohetesController", "borrarCohete");
$router->addRoute("editarcohete", "GET", "CohetesController", "editarCohete");
$router->addRoute("updatecohete", "UPDATE", "CohetesController", "updateCohete");
$router->addRoute("vercohete", "GET", "CohetesController", "getCohete");
$router->addRoute("sortcohetes", "GET", "CohetesController", "getSortCohetes");
$router->addRoute("empresas", "GET", "EmpresasController", "verEmpresas");
$router->addRoute("verempresa", "GET", "EmpresasController", "verEmpresa");
$router->addRoute("editarempresa", "GET", "EmpresasController", "editarEmpresa");
$router->addRoute("updateempresa", "UPDATE", "EmpresasController", "updateEmpresa");
$router->addRoute("insertarempresa", "PUT", "EmpresasController", "insertarEmpresa");
$router->addRoute("borrarempresa", "DELETE", "EmpresasController", "borrarEmpresa");
$router->addRoute("home", "GET", "IndexView", "displayIndex");
$router->setDefaultRoute("IndexView", "displayIndex");

$router->route($resource, $method);
?>