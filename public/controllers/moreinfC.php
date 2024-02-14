<?php
require_once 'libs/controller.php';
class MoreinfC extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $moreinfC = $this->model->getAllCards();
        $this->view->moreinfC = $moreinfC;

        $header = $this->model->getByEncabezado('Maestrias');
        $this->view->header = $header;
        
        $this->view->render('moreinfC/index');
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
