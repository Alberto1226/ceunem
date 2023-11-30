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
        $this->view->render('nosotros/index');
    }

}

?>