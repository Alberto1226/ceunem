<?php
require_once 'libs/controller.php';
class Registrar extends Controller
{
    function __construct()
    {
        parent::__construct();
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render()
    {
        $this->view->render('registrar/index');
    }

    function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameFull = $_POST['nameFull'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            //encriptacion
            $encrip = hash("SHA256",$pass);
            if (strlen($nameFull) != 0 and strlen($email) != 0 and strlen($pass)) {
                if($this->model->insert([
                    'nombre' => $nameFull,
                    'email' => $email,
                    'pass' => $encrip
                ])){
                    echo "Envio exitoso";
                }
                header('location: ' . URL . 'login');
            } else {
                echo "Verifique los campos";
            }
        } else {
            echo "No se recibio por post";
        }
    }
}
