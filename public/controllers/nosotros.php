<?php
require_once 'libs/controller.php';
class Nosotros extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('nosotros/index');

    }

}

?>