<?php
require_once 'libs/controller.php';
class Aviso extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('aviso/index');

    }

}

?>