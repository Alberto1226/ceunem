<?php
require_once 'libs/controller.php';


class Testimonios extends Controller
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
        $tablas = $this->model->getTest();
        $this->view->tablas = $tablas;
        $this->view->render('testimonios/index');
    }

    function addTestimonios()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $carrera = $_POST['carrera'];
            $testimonio = $_POST['testimonio'];
            $img_url = $_FILES['img_url']['tmp_name'];
            $estado = 1;
            $id_usu = $_POST['id_usu'];

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/testimonios/";
            $fecha = date('Ymd_His');
            $r = $dir . $fecha . "_" . $imgName;

            $item = [
                'nombre' => $nombre,
                'carrera' => $carrera,
                'testimonio' => $testimonio,
                'img_url' => $r,
                'estado' => $estado,
                'id_usu' => $id_usu,
            ];

            if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                if ($this->model->insert($item)) {
                    if(move_uploaded_file($img_url, $r)){
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'testimonios'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }else{
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al guardar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al insertar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Formato no admitido',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getTestimonio(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tes =  json_decode(file_get_contents('php://input'))->id_tes;
            $tabla = $this->model->getById($id_tes);
            echo json_encode($tabla);
        }
    }

    function upTestimonio(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $carrera = $_POST['carrera'];
            $testimonio = $_POST['testimonio'];
            $img_url = $_FILES['img_url']['tmp_name'];
            $estado = $_POST['estado'];
            $id_tes = $_POST['id_tes'];
            $imgBd = $_POST['img_urlBd'];
            $id_usu = $_POST['id_usu'];

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/testimonios/";
            $fecha = date('Ymd_His');
            $r = $dir . $fecha . "_" . $imgName;

            $ruta = is_file($img_url) ? $ruta = $r : $ruta = $imgBd;

            $item = [
                'id_tes' => $id_tes,
                'nombre' => $nombre,
                'carrera' => $carrera,
                'testimonio' => $testimonio,
                'img_url' => $ruta,
                'estado' => $estado,
                'id_usu' => $id_usu,
            ];

            if(is_file($img_url)){
                if ($timg == "jpg" or $timg == "jpeg" or $timg == "png") {
                    if ($this->model->update($item)) {
                        if(move_uploaded_file($img_url, $r)){
                            unlink($imgBd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'testimonios'
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }else{
                            $arrResponse = array(
                                'status' => false, 'msg' => 'Error al guardar la imagen',
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al modificar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Formato no admitido',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if ($this->model->update($item)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'testimonios'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al insertar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }

    function delTest(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tes = $_POST['id_tes'];
            $id_usu = $_POST['id_usu'];
            $img_url = $_POST['img_delete'];
            
            if ($this->model->delete([
                'id_tes' => $id_tes,
                'id_usu' => $id_usu
            ])) {
                unlink($img_url);
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok', 
                    'url' => URL.'testimonios');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar los datos');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function statusTest(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tes = $_POST['id_tes'];
            $id_usu = $_POST['id_usu'];
            $estado = $_POST['estado'];
            
            $estado2 = $estado == 1 ? $estado2=0 : $estado2=1;

            if ($this->model->estado([
                'id_tes' => $id_tes,
                'id_usu' => $id_usu,
                'estado' => $estado2
            ])) {
                $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'testimonios');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al cambiar el status');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function addEncabezado()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $encabezado = $_POST['encabezado'];
            $descripcion = $_POST['descripcion'];
            $id_en = $_POST['id_en'];

            $ids = empty($id_en) ? $ids = false : $ids = true;

            $insertar = [
                'id_usu' => $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
            ];

            $editar = [
                'id_usu' => $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
                'id_en' => $id_en
            ];

            if ($ids == false) {
                if ($this->model->insertEncabezado($insertar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'testimonios');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->updateEncabezado($editar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'testimonios');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }

    function getEncabezado()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $encabezado =  json_decode(file_get_contents('php://input'))->encabezado;
            $tabla = $this->model->getByEncabezado($encabezado);
            echo json_encode($tabla);
        }
    }
}
