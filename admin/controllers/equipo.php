<?php
require_once 'libs/controller.php';
class Equipo extends Controller
{
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
        $tablas = $this->model->getAllEquipo();
        $this->view->tablas = $tablas;
        $this->view->render('equipo/index');
    }

    function addEquipo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $nombre = $_POST['nombre'];
            $puesto = $_POST['puesto'];
            $rFace = $_POST['rFace'];
            $rTw = $_POST['rTw'];
            $rIns = $_POST['rIns'];
            $estado = $_POST['estado'];

            $img_url = $_FILES['img_url']['tmp_name'];
            $img_n = $_FILES['img_url']['name'];
            $t_n = strtolower(pathinfo($img_n, PATHINFO_EXTENSION));

            $dir = "public/img/equipo/";
            $fecha = date('Ymd_His');
            $r_n = $dir . $fecha . "_" . $img_n;

            if (
                strlen($id_usu) != 0 and strlen($nombre) != 0
                and strlen($puesto) != 0 and strlen($estado) != 0 and strlen($img_url) != 0
                and $t_n == "jpg" or $t_n == "jpeg" or $t_n == "png"
            ) {
                if ($this->model->insert([
                    'id_usu' => $id_usu,
                    'nombre' => $nombre,
                    'puesto' => $puesto,
                    'img_url' => $r_n,
                    'rFace' => $rFace,
                    'rTw' => $rTw,
                    'rIns' => $rIns,
                    'estado' => $estado,
                ])) {
                    if (move_uploaded_file($img_url, $r_n)) {

                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL.'equipo'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al subir imagen.');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al subir datos.');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Verifique los campos.');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getEquipo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_eq =  json_decode(file_get_contents('php://input'))->id_eq;
            $tabla = $this->model->getById($id_eq);
            echo json_encode($tabla);
        }
    }

    function upEquipo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $id_eq = $_POST['id_eq'];
            $img_bd = $_POST['img_bd'];
            $nombre = $_POST['nombre'];
            $puesto = $_POST['puesto'];
            $rFace = $_POST['rFace'];
            $rTw = $_POST['rTw'];
            $rIns = $_POST['rIns'];

            $img_url = $_FILES['img_url']['tmp_name'];
            $img_n = $_FILES['img_url']['name'];
            $t_n = strtolower(pathinfo($img_n, PATHINFO_EXTENSION));

            $dir = "public/img/equipo/";
            $fecha = date('Ymd_His');
            $r_n = $dir . $fecha . "_" . $img_n;

            if (is_file($img_url)) {
                if ($t_n == "jpg" or $t_n == "jpeg" or $t_n == "png") {
                    if (unlink($img_bd)) {
                        if (move_uploaded_file($img_url, $r_n)) {
                            if ($this->model->update([
                                'id_usu' => $id_usu,
                                'id_eq' => $id_eq,
                                'nombre' => $nombre,
                                'puesto' => $puesto,
                                'img_url' => $r_n,
                                'rFace' => $rFace,
                                'rTw' => $rTw,
                                'rIns' => $rIns
                            ])) {
                                $tabla = new Profesionista();
                                $tabla->id_usu = $id_usu;
                                $tabla->id_eq = $id_eq;
                                $tabla->nombre = $nombre;
                                $tabla->puesto = $puesto;
                                $tabla->img_url = $r_n;
                                $tabla->rFace = $rFace;
                                $tabla->rTw = $rTw;
                                $tabla->rIns = $rIns;
                                $arrResponse = array('status' => true, 'msg' => 'ok', 
                                'url' => URL.'equipo');
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
                    'id_eq' => $id_eq,
                    'nombre' => $nombre,
                    'puesto' => $puesto,
                    'img_url' => $img_bd,
                    'rFace' => $rFace,
                    'rTw' => $rTw,
                    'rIns' => $rIns
                ])) {
                    $tabla = new Profesionista();
                    $tabla->id_usu = $id_usu;
                    $tabla->id_eq = $id_eq;
                    $tabla->nombre = $nombre;
                    $tabla->puesto = $puesto;
                    $tabla->img_url = $img_bd;
                    $tabla->rFace = $rFace;
                    $tabla->rTw = $rTw;
                    $tabla->rIns = $rIns;
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'equipo');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al guardar la información');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }

    function delEquipo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_eq = $_POST['id_eq'];
            $id_usu = $_POST['id_usu'];
            $img_url = $_POST['img_delete'];

            if (unlink($img_url)) {
                if ($this->model->delete([
                    'id_eq' => $id_eq,
                    'id_usu' => $id_usu
                ])) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'equipo');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar los datos');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la imagen');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function statusEquipo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_eq = $_POST['id_eq'];
            $id_usu = $_POST['id_usu'];
            $estado = $_POST['estado'];
            $estado2 = 0;

            if ($estado == 0) {
                $estado2 = 1;
            } else {
                $estado2 = 0;
            }

            if ($this->model->estado([
                'id_eq' => $id_eq,
                'id_usu' => $id_usu,
                'estado' => $estado2
            ])) {
                $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'equipo');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al cambiar el status');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function addEncabezado(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $encabezado = $_POST['encabezado'];
            $descripcion = $_POST['descripcion'];
            $id_en = $_POST['id_en'];

            $insertar =[
                'id_usu'=> $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
            ];

            $editar =[
                'id_usu'=> $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
                'id_en' => $id_en
            ];

            if(empty($id_en)){
                if($this->model->insertEncabezado($insertar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'blog');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->updateEncabezado($editar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'blog');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            
        }
    }

    function getEncabezado(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $encabezado =  json_decode(file_get_contents('php://input'))->encabezado;
            $tabla = $this->model->getByEncabezado($encabezado);
            echo json_encode($tabla);
        }
    }
}
