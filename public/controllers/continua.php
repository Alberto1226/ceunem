<?php
require_once 'libs/controller.php';
class Continua extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {       
        $fila = $this->model->countRowsContinuas();
        $this->view->fila = $fila;
        
        $continuas = $this->model->getAllContinuas();
        $this->view->continuas = $continuas;

        $header = $this->model->getByEncabezado('Educación Continua');
        $this->view->header = $header;

        $this->view->render('continua/index');
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
