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
        
        $this->view->render('blog/index');
    }

}

?>