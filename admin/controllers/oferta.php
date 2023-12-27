<?php
require_once 'libs/controller.php';
class Oferta extends Controller
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
        $tablas = $this->model->getOfertas();
        $this->view->tablas = $tablas;

        $this->view->render('oferta/index');
    }

    function addProg()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_url = $_FILES['img_url']['tmp_name'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $btn_name = $_POST['btn_name'];
            $link = $_POST['link'];
            $id_usu = $_POST['id_usu'];
            $estado = 1;

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/oferta/";
            $fecha = date('Ymd_His');
            $r = $dir . $tit . $fecha . "_" . $imgName;

            $item = [
                'img_url' => $r,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'btn_name' => $btn_name,
                'link' => $link,
                'estado' => $estado,
                'id_usu' => $id_usu
            ];

            if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                if ($this->model->insert($item)) {
                    if(move_uploaded_file($img_url, $r)){
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'oferta'
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
}
