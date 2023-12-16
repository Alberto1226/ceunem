<?php
require_once 'libs/controller.php';
class Contacto extends Controller
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
        $fila = $this->model->rowContacto($id_usu);
        $this->view->fila = $fila;
        $this->view->render('contacto/index');
    }

    function addForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nCompleto = (isset($_POST['nCompleto'])) && !empty($_POST['nCompleto']) ? 1 : 0;
            $nombre = (isset($_POST['nombre'])) && !empty($_POST['nombre']) ? 1 : 0;
            $apellidos = (isset($_POST['apellidos'])) && !empty($_POST['apellidos']) ? 1 : 0;
            $email = (isset($_POST['email'])) && !empty($_POST['email']) ? 1 : 0;
            $tel = (isset($_POST['tel'])) && !empty($_POST['tel']) ? 1 : 0;
            $face = (isset($_POST['face'])) && !empty($_POST['face']) ? 1 : 0;
            $mensaje = (isset($_POST['mensaje'])) && !empty($_POST['mensaje']) ? 1 : 0;
            $asunto = (isset($_POST['asunto'])) && !empty($_POST['asunto']) ? 1 : 0;
            $live = (isset($_POST['live'])) && !empty($_POST['live']) ? 1 : 0;
            $id_usu = $_POST['id_usu'];

            if ($this->model->insert([
                'nCompleto' => $nCompleto,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'email' => $email,
                'tel' => $tel,
                'face' => $face,
                'mensaje' => $mensaje,
                'asunto' => $asunto,
                'live' => $live,
                'id_usu' => $id_usu,
            ])) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' => URL.'contacto'
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

    function getInputs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getForm($id_usu);
            echo json_encode($tabla);
        }
    }

    function upForm(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nCompleto = (isset($_POST['nCompleto'])) && !empty($_POST['nCompleto']) ? 1 : 0;
            $nombre = (isset($_POST['nombre'])) && !empty($_POST['nombre']) ? 1 : 0;
            $apellidos = (isset($_POST['apellidos'])) && !empty($_POST['apellidos']) ? 1 : 0;
            $email = (isset($_POST['email'])) && !empty($_POST['email']) ? 1 : 0;
            $tel = (isset($_POST['tel'])) && !empty($_POST['tel']) ? 1 : 0;
            $face = (isset($_POST['face'])) && !empty($_POST['face']) ? 1 : 0;
            $mensaje = (isset($_POST['mensaje'])) && !empty($_POST['mensaje']) ? 1 : 0;
            $asunto = (isset($_POST['asunto'])) && !empty($_POST['asunto']) ? 1 : 0;
            $live = (isset($_POST['live'])) && !empty($_POST['live']) ? 1 : 0;
            $id_usu = $_POST['id_usu'];
            $id_form = $_POST['id_form'];

            if ($this->model->update([
                'id_form' => $id_form,
                'nCompleto' => $nCompleto,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'email' => $email,
                'tel' => $tel,
                'face' => $face,
                'mensaje' => $mensaje,
                'asunto' => $asunto,
                'live' => $live,
                'id_usu' => $id_usu,
            ])) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' =>  URL.'contacto'
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
