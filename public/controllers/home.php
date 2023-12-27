<?php
require_once 'libs/controller.php';

class Home extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;

        $inputs = $this->model->getInputs();
        $this->view->inputs = $inputs;

        $secEqs = $this->model->getProfesionisitas();
        $this->view->secEqs = $secEqs;

        $sliders = $this->model->getSliders();
        $this->view->sliders = $sliders;

        $programa = $this->model->getPrograma();
        $this->view->programa = $programa;
        
        $this->view->render('home/index');
    }
}
?>