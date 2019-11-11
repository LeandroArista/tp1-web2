<?php
    require_once('Router.php');
    require_once('./api/ComentariosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/comentarios/:id_comentario", "GET", "ComentariosApiController", "getCometariosCohete");
    $router->addRoute("/comentariosfecha/:id_comentario", "GET", "ComentariosApiController", "getCometariosSortByFecha");
    $router->addRoute("/comentariosprioridad/:id_comentario", "GET", "ComentariosApiController", "getCometariosSortByPrioridad");
    $router->addRoute("/comentarios/:id_comentario", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/comentarios", "POST", "ComentariosApiController", "insertarComentario");
    
    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
