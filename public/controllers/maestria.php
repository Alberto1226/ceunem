<?php
require_once 'libs/controller.php';
class Maestria extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $maestrias = $this->model->getAllMaestrias();
        $this->view->maestrias = $maestrias;

        $header = $this->model->getByEncabezado('Maestrías');
        $this->view->header = $header;

        $this->view->render('maestria/index');
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

?>