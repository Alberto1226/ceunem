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

        $ofertas = $this->model->getOfertas();
        $this->view->ofertas = $ofertas;

        $testimonios = $this->model->getTestimonios();
        $this->view->testimonios = $testimonios;

        $sliders = $this->model->getSliders();
        $this->view->sliders = $sliders;
        
        $this->view->render('home/index');
    }

    function getWhats(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tabla = $this->model->getWhats();
            echo json_encode($tabla);
        }
    }

    function getPrograma(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $programa = $this->model->getPrograma();
            echo json_encode($programa);
        }
    }

    function getColores(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colores = $this->model->getColor();
            echo json_encode($colores);
        }
    }

    function getEncabezado()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $encabezado =  json_decode(file_get_contents('php://input'))->encabezado;
            $seccionEn = $this->model->getByEncabezado($encabezado);
            echo json_encode($seccionEn);
        }
    }
}
?>