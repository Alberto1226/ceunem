<?php 
require_once 'libs/controller.php';


class Errores extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->getMensaje("Hubo un error en la solicitud o no existe la página");
        $this->view->render('errores/index');
        //echo "<p>Error al cargar recurso</p>"; 
    }
}

?>