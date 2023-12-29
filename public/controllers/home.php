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

        $programas = $this->model->getPrograma();
        $this->view->programa = $programas;
        
        $this->view->render('home/index');
    }

    function getWhats(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tabla = $this->model->getWhats();
            echo json_encode($tabla);
        }
    }
}
?>