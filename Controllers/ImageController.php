<?php
require_once "./Models/ImageModel.php";


class ImageController{

    private $model;

  public function __construct(){
    $this->model=new ImageModel();
  }

  public function insertarImagen($id_cohete){
    foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["imagen"]["name"][$key]) {
			$filename = $_FILES["imagen"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["imagen"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'img'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracción");	
            }
            
            $extension = explode(".", $filename);
            $reversed = array_reverse($extension);
            $newfilename = uniqid().'.'.$reversed[0];
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$newfilename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {
                if($_FILES['imagen']['type'][$key] == "image/jpg" || $_FILES['imagen']['type'][$key] == "image/jpeg" 
                || $_FILES['imagen']['type'][$key] == "image/png")	
                $this->model->insertarImagen($target_path,$id_cohete);
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
    header("Location:".BASE_URL."cohetes");
  }
    public function getImagen($id_imagen){
        return $this->model->getImagen($id_imagen);
    }
    public function getImagenes($id_cohete) {
        return $this->model->getImagenes($id_cohete);
    }

    public function removerImagen($id_imagen){
        $this->model->removerImagen($id_imagen);
    }

    public function removerImagenes($id_cohete){
        $this->model->removerImagenes($id_cohete);
    }
}
    