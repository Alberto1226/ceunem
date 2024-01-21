<?php
require_once 'libs/controller.php';
class Licenciatura extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $licenciaturas = $this->model->getAllLicenciaturas();
        $this->view->licenciaturas = $licenciaturas;

        $header = $this->model->getByEncabezado('Licenciaturas');
        $this->view->header = $header;
        
        $this->view->render('licenciatura/index');
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
