<?php
require_once 'libs/controller.php';
class Continua extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('continua/index');

    }

}

?>