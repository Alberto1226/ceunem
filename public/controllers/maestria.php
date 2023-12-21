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

        $this->view->render('maestria/index');
    }

}

?>