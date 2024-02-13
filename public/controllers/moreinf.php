<?php
require_once 'libs/controller.php';
class Moreinf extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $moreinf = $this->model->getAllCards();
        $this->view->moreinf = $moreinf;

        $header = $this->model->getByEncabezado('Licenciaturas');
        $this->view->header = $header;
        
        $this->view->render('moreinf/index');
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
