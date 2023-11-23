<?php
require_once 'libs/controller.php';
class Home extends Controller{
    function __construct()
    {
        parent::__construct();
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render(){
        $this->view->render('home');

    }

    function saludo(){
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
}

?>