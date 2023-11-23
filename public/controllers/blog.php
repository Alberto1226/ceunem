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

}

?>