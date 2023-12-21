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

        $this->view->render('continua/index');
    }
}
