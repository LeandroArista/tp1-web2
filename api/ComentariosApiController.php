<?php
require_once("./Models/ComentariosModel.php");
require_once("./api/JSONView.php");

class ComentariosApiController {

    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new ComentariosModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCometariosCohete($params = null) {
        $id_cohete = $params[':id_cohete'];
        
        $comentarios = $this->model->getComentariosCohete($id_cohete);        
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response("no existen comentarios con el id_cohete={$id_cohete}", 404);
    } 

    public function borrarComentario($params = null) {
        $id_comentario = $params[':id_comentario'];
        $tarea = $this->model->get($id_comentario);
        if ($tarea) {
            $this->model->delete($id);
            $this->view->response("El comentario fue borrado con exito.", 200);
        } else
            $this->view->response("El comentario con el id={$id_comentario} no existe", 404);
    }

    public function insertarComentario($id_cohete,$id_usuario,$params = null) {
        $data = $this->getData();

        $id = $this->model->insertarComentario($data->texto, $data->fecha, $data->puntaje,$id_cohete,$id_usuario);
        
        $tarea = $this->model->get($id);
        if ($tarea)
            $this->view->response($tarea, 200);
        else
            $this->view->response("La tarea no fue creada", 500);

    }

    public function updateTask($params = null) {
        $id = $params[':ID'];
        $data = $this->getData();
        
        $tarea = $this->model->get($id);
        if ($tarea) {
            $this->model->update($id, $data->prioridad);
            $this->view->response("La tarea fue modificada con exito.", 200);
        } else
            $this->view->response("La tarea con el id={$id} no existe", 404);
    }
}
