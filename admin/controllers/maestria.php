<?php
require_once 'libs/controller.php';
class Maestria extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('maestria/index');

    }

}

?>