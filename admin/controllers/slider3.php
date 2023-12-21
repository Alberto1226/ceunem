<?php
require_once 'libs/controller.php';
class Slider3 extends Controller
{
    public $id;
    function __construct()
    {
        session_start();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
    }

    function render()
    {
        $this->view->render('slider3/index');
    }



}
