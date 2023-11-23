<?php
require_once 'libs/controller.php';
class Blog extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        
        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;
        $this->view->render('blog/index');

    }

    function insertArticulo(){
        $mensaje="";

        $categoria = $_POST['categoria'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $link_url = $_POST['link_url'];
        $img_url=$_FILES["img_url"]["tmp_name"];
        $nom_img=$_FILES["img_url"]["name"];
        $tipoImagen=strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $directorio="public/img/blog/";

        if($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png"){
            $ruta=$directorio.$nom_img;
            if(move_uploaded_file($img_url,$ruta)){
                if($this->model->insert([
                    'categoria'=>$categoria,
                    'titulo'=>$titulo,
                    'descripcion'=>$descripcion,
                    'img_url'=>$ruta,
                    'link_url'=>$link_url,
                ])){
                    $mensaje="Se agrego correctamente";
                }
                $this->view->getMensaje($mensaje);
                $this->render();
            }else{
                $mensaje="Error al guardar en el directorio";
            }
        }else{
            $mensaje="El formato es incorrecto";
        }
    }

    function getArticulo($param = null){
        $idBlog = $param[0];
        $articulo = $this->model->getBlogId($idBlog);
        $this->view->articulo = $articulo;
        $this->view->getMensaje("");
        $this->view->render('blog/updateBlogModal');
    }

}

?>