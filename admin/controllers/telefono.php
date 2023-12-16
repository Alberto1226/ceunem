<?php
require_once 'libs/controller.php';
class Telefono extends Controller
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
        $fila = $this->model->rowCon($id_usu);
        $this->view->fila = $fila;
        $this->view->render('telefono/index');
    }

    function addWhats()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];
            $mensaje = $_POST['mensaje'];
            $id_usu = $_POST['id_usu'];

            if ($this->model->insert([
                'numero' => $numero,
                'mensaje' => $mensaje,
                'id_usu' => $id_usu,
            ])) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' => URL.'telefono'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Error al guardar los datos'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getWhats(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getWhatsaap($id_usu);
            echo json_encode($tabla);
        }
    }

    function upWhats(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];
            $mensaje = $_POST['mensaje'];
            $id_usu = $_POST['id_usu'];
            $id_tel = $_POST['id_tel'];

            if ($this->model->update([
                'numero' => $numero,
                'mensaje' => $mensaje,
                'id_usu' => $id_usu,
                'id_tel' => $id_tel
            ])) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' => URL.'telefono'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Error al guardar los datos'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
