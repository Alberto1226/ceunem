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

        $this->view->render('nosotros/index');
    }

}

?>