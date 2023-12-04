<?php
require_once 'libs/controller.php';
class Panel extends Controller{
    function __construct()
    {
        parent::__construct();

        session_start();
        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render(){
        $this->view->render('panel/index');

    }

}

?>