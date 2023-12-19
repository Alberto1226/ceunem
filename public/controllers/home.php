<?php
require_once 'libs/controller.php';
class Home extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $ini1 = $this->model->getVideo();
        $this->view->ini1 = $ini1;

        $tel = $this->model->getWhats();
        $this->view->tel = $tel;

        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;
        
        $secEqs = $this->model->getProfesionisitas();
        $this->view->secEqs = $secEqs;

        $inputs = $this->model->getInputs();
        $this->view->inputs = $inputs;

        $imgs = $this->model->getImgs();
        $this->view->imgs = $imgs;

        $this->view->render('home/index', $tel);
    }

}
?>