<?php
require_once 'libs/controller.php';
require_once 'models/slidersModel.php';
class Slider1 extends Controller
{
    public $id;
    private $sliders;
    function __construct()
    {
        session_start();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
        $this->sliders = new SlidersModel();
    }

    function render()
    {
        $this->view->render('slider1/index');
    }

    function addImg(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_usu = $_POST['id_usu'];
            $posicion = $_POST['posicion'];
            $img = $_FILES['img']['tmp_name'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $sName = $_POST['sName'];
            $sLink = $_POST['sLink'];
            $link = $_POST['link'];

            $url = $sLink === 'otro' ? $url = $link : $url = $sLink;
            $tUrl = $sLink === 'otro' ? $tUrl = 2 : $tUrl=1;
            
            $imgName = $_FILES['img']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            
            $dir = "public/img/sliders/";
            $fecha = date('Ymd_His');
            $r = $dir . "IMG1_" . $fecha . "_" . $imgName;

            $slider = [
                'img' => $r,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'btn_name' => $sName,
                'link' => $url,
                'tUrl' => $tUrl,
                'posicion' => $posicion,
                'id_usu' => $id_usu
            ];

            if (
                $timg == "jpg" or $timg == "jpeg" or $timg == "png") {
                if ($this->model->insert($slider)) {
                    if (move_uploaded_file($img, $r)) {
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'sliders'
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
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Formatos no aceptados',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
