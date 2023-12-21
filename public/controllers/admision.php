<?php
require_once 'libs/controller.php';
class Admision extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('admision/index');
    }

}

?>