<?php
require_once 'libs/controller.php';
require_once 'models/slidersModel.php';
class Slider1 extends Controller
{
    public $id;
    private $sliders;
    function __construct()
    {
        session_start();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
        $this->sliders = new SlidersModel();
    }

    function render()
    {
        $this->view->render('slider1/index');
    }
}
