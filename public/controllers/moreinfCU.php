<?php
require_once 'libs/controller.php';
class MoreinfCU extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $moreinfCU = $this->model->getAllCards();
        $this->view->moreinfCU = $moreinfCU;

        $header = $this->model->getByEncabezado('Maestrias');
        $this->view->header = $header;
        
        $this->view->render('moreinfCU/index');
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
