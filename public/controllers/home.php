<?php
require_once 'libs/controller.php';
class Home extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $sliders = $this->model->getSliders();
        $this->view->slider = $sliders;

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