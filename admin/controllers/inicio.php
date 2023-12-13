<?php
require_once 'libs/controller.php';
class Inicio extends Controller
{
    public $id;

    function __construct()
    {
        parent::__construct();

        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
    }

    function render()
    {
        $id_usu = $this->id = $_SESSION['id_usu'];
        $fila = $this->model->countRow($id_usu);
        $this->view->fila = $fila;

        $this->view->render('inicio/index');
    }

    function addInicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $vid_url = $_FILES['vid_url']['tmp_name'];
            $vid_name = $_FILES['vid_url']['name'];

            $t_v = strtolower(pathinfo($vid_name, PATHINFO_EXTENSION));

            $dir = "public/vid/inicio/";
            $fecha = date('Ymd_His');
            $r_v = $dir . "VIDEO_" . $fecha . "." . $t_v;

            if ($t_v == "mp4") {
                if (move_uploaded_file($vid_url, $r_v)) {
                    if ($this->model->insert([
                        'vid_url' => $r_v,
                        'estado' => 1,
                        'id_usu' => $id_usu,
                    ])) {
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => 'http://localhost/proyectos/ceunem/admin/inicio'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al guardar los datos.');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al guardar el video.');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Verifique la extensión del video.');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getIni()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getIni($id_usu);
            echo json_encode($tabla);
        }
    }

    function upIni()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $id_ini = $_POST['id_ini'];
            $vid_bd = $_POST['vid_bd'];
            $vid_url = $_FILES['vid_url2']['tmp_name'];
            $vid_name = $_FILES['vid_url2']['name'];

            $t_v = strtolower(pathinfo($vid_name, PATHINFO_EXTENSION));

            $dir = "public/vid/inicio/";
            $fecha = date('Ymd_His');
            $r_v = $dir . "VIDEO_" . $fecha . "." . $t_v;

            if (is_file($vid_url)) {
                if ($t_v == "mp4") {
                    if (unlink($vid_bd)) {
                        if (move_uploaded_file($vid_url, $r_v)) {
                            if ($this->model->update([
                                'id_usu' => $id_usu,
                                'id_ini' => $id_ini,
                                'vid_url' => $r_v,
                            ])) {
                                $arrResponse = array(
                                    'status' => true, 
                                    'msg' => 'ok', 
                                    'url' => 'http://localhost/proyectos/ceunem/admin/inicio');
                                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                            } else {
                                $arrResponse = array('status' => false, 'msg' => 'Error al guardar la información');
                                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                            }
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'Error al cargar la imagen');
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la imagen anterior');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Formato no aceptado');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->update([
                    'id_usu' => $id_usu,
                    'id_ini' => $id_ini,
                    'vid_url' => $vid_bd,
                ])) {
                    $arrResponse = array(
                        'status' => true, 
                        'msg' => 'ok', 
                        'url' => 'http://localhost/proyectos/ceunem/admin/inicio');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al guardar la información');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
}
