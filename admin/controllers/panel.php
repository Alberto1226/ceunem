<?php
require_once 'libs/controller.php';
class Panel extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $this->view->render('panel/index');

    }

}

?>