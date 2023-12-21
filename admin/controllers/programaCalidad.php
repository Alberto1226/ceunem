<?php
require_once 'libs/controller.php';
class ProgramaCalidad extends Controller
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
        $id_usu = $this->id = $_SESSION['id_usu'];
        $fila = $this->model->countRow($id_usu);
        
        $this->view->render('programaCalidad/index');
    }

}
