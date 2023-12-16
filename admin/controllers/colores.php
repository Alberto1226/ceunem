<?php
require_once 'libs/controller.php';
class Colores extends Controller
{
    function __construct()
    {
        session_start();
        parent::__construct();

        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render()
    {

        $this->view->render('colores/index');
    }

}
