<?php
require_once 'libs/controller.php';
class Licenciatura extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('licenciatura/index');

    }

}

?>