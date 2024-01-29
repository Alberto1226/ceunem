<?php
require_once 'libs/controller.php';
class Cursos extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $cursos = $this->model->getAllCursos();
        $this->view->cursos = $cursos;

        $header = $this->model->getByEncabezado('cursos');
        $this->view->header = $header;
        
        $this->view->render('cursos/index');
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
