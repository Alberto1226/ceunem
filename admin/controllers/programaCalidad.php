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
        $this->view->fila = $fila;

        $this->view->render('programaCalidad/index');
    }

    function addProg()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_usu = $_POST['id_usu'];
            $img_url = $_FILES['img_url']['tmp_name'];
            $nom_menu = $_POST['nom_menu'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $btn_name = $_POST['btn_name'];
            $sLink = $_POST['sLink'];
            $link = $_POST['link'];

            $url = $sLink === 'otro' ? $url = $link : $url = $sLink;
            $tUrl = $sLink === 'otro' ? $tUrl = 2 : $tUrl = 1;

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/calidad/";
            $fecha = date('Ymd_His');
            $tipo = $timg === "mp4" ? $tipo = "VIDEO_" : $tipo = "IMAGEN_";
            $r = $dir . $tipo . $fecha . "_" . $imgName;

            $item = [
                'nom_menu' => $nom_menu,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'img_url' => $r,
                'btn_name' => $btn_name,
                'link' => $url,
                'tUrl' => $tUrl,
                'id_usu' => $id_usu
            ];

            if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                if ($this->model->insert($item)) {
                    if (move_uploaded_file($img_url, $r)) {
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'programaCalidad'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
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
            }
        }
    }

    function getProg()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getPrograma($id_usu);
            echo json_encode($tabla);
        }
    }

    function upProg()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_prog = $_POST['id_prog'];
            $imgBd = $_POST['img_urlBd'];
            $id_usu = $_POST['id_usu'];
            $img_url = $_FILES['img_url']['tmp_name'];
            $nom_menu = $_POST['nom_menu'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $btn_name = $_POST['btn_name'];
            $sLink = $_POST['sLink'];
            $link = $_POST['link'];

            $url = $sLink === 'otro' ? $url = $link : $url = $sLink;
            $tUrl = $sLink === 'otro' ? $tUrl = 2 : $tUrl = 1;

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/calidad/";
            $fecha = date('Ymd_His');
            $tipo = $timg === "mp4" ? $tipo = "VIDEO_" : $tipo = "IMAGEN_";
            $r = $dir . $tipo . $fecha . "_" . $imgName;

            $imagenRuta = is_file($img_url) ? $imagenRuta = $r : $imagenRuta = $imgBd;

            $item = [
                'id_prog' => $id_prog,
                'nom_menu' => $nom_menu,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'img_url' => $imagenRuta,
                'btn_name' => $btn_name,
                'link' => $url,
                'tUrl' => $tUrl,
                'id_usu' => $id_usu
            ];

            if (is_file($img_url)) {
                if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                    if ($this->model->update($item)) {
                        if (move_uploaded_file($img_url, $r)) {
                            unlink($imgBd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'programaCalidad'
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
            } else {
                if ($this->model->update($item)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'programaCalidad'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al modificar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
}
