<?php
require_once 'libs/controller.php';
class Blog extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $fila = $this->model->countBlog();
        $this->view->fila = $fila;

        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;

        $header = $this->model->getByEncabezado('Blog');
        $this->view->header = $header;
        
        $this->view->render('blog/index');
    }

    public function getBanner()
    {        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $banner = $this->model->getBanner();
            $imagenBanner = constant('ARCHIVOS').$banner[0]->img;            
            echo json_encode($imagenBanner);
        }     
    }

}

?>