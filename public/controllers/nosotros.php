<?php
require_once 'libs/controller.php';
class Nosotros extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){      
        $secMisions = $this->model->getMision();
        $this->view->secMisions = $secMisions;

        $secVisions = $this->model->getVision();
        $this->view->secVisions = $secVisions;

        $secObjs = $this->model->getObjetivos();
        $this->view->secObjs = $secObjs;

        $secVals = $this->model->getValores();
        $this->view->secVals = $secVals;

        $secEqs = $this->model->getProfesionisitas();
        $this->view->secEqs = $secEqs;

        $header = $this->model->getByEncabezado('Filosofía');
        $this->view->header = $header;

        $header1 = $this->model->getByEncabezado('Nuestro Equipo');
        $this->view->header1 = $header1;
        
        $this->view->render('nosotros/index');
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