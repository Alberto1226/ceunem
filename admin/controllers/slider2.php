<?php
require_once 'libs/controller.php';
class Slider2 extends Controller
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
        $this->view->render('slider2/index');
    }



}
