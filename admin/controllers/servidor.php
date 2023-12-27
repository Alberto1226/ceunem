<?php
require_once 'libs/controller.php';
class Servidor extends Controller
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
        $this->view->render('servidor/index');
    }

    function configuracion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dirServer = $_POST['dirServer'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $portServer = $_POST['portServer'];
            $conect = $_POST['conect'];
            $nombre = $_POST['nombre'];
            $id_usu = $_POST['id_usu'];

            $smtp = [
                'dirServer' => $dirServer,
                'email' => $email,
                'pass' => $pass,
                'portServer' => $portServer,
                'conect' => $conect,
                'nombre' => $nombre,
                'id_usu' => $id_usu,
            ];
            

            if ($this->model->insert($smtp)) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' => URL.'servidor'
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

    function getConfig()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getSmtp($id_usu);
            echo json_encode($tabla);
        }
    }

    function upConfig()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dirServer = $_POST['dirServer'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $portServer = $_POST['portServer'];
            $conect = $_POST['conect'];
            $nombre = $_POST['nombre'];
            $id_usu = $_POST['id_usu'];
            $id_smtp = $_POST['id_smtp'];

            $smtp = [
                'id_smtp' => $id_smtp,
                'dirServer' => $dirServer,
                'email' => $email,
                'pass' => $pass,
                'portServer' => $portServer,
                'conect' => $conect,
                'nombre' => $nombre,
                'id_usu' => $id_usu,
            ];

            if ($this->model->update($smtp)) {
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok',
                    'url' => URL . 'servidor'
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
