<?php
    require_once('Router.php');
    require_once('./api/ComentariosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();
    // rutas
    $router->addRoute("/comentarios/:id_cohete", "GET", "ComentariosApiController", "getComentarios");
    $router->addRoute("/comentariosfecha/:id_cohete", "GET", "ComentariosApiController", "getComentariosByFecha");
    $router->addRoute("/comentariospuntaje/:id_cohete", "GET", "ComentariosApiController", "getComentariosByPuntaje");
    $router->addRoute("/comentario/:id_comentario", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/comentario", "POST", "ComentariosApiController", "insertarComentario");
    
    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
