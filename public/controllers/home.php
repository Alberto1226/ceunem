<?php
require_once 'libs/controller.php';
class Home extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
       $imgs = $this->model->getImgs();
        $this->view->imgs = $imgs;

        $ini1 = $this->model->getVideo();
        $this->view->ini1 = $ini1;

        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;

        $inputs = $this->model->getInputs();
        $this->view->inputs = $inputs;

        $secEqs = $this->model->getProfesionisitas();
        $this->view->secEqs = $secEqs;
        $this->view->render('home/index');
    }


}
?>