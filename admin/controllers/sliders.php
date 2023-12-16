<?php
require_once 'libs/controller.php';
class Sliders extends Controller
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

        $this->view->render('sliders/index');
    }

    function addImgs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tit1 = $_POST['tit1'];
            $desc1 = $_POST['desc1'];
            $tit2 = $_POST['tit2'];
            $desc2 = $_POST['desc2'];
            $id_usu = $_POST['id_usu'];

            $link1 = $_POST['link1'];
            $link2 = $_POST['link2'];
            $sLink1 = $_POST['sLink1'];
            $sLink2 = $_POST['sLink2'];

            $url1 = $sLink1 === 'otro' ? $url1 = $link1 : $url1 = $sLink1;
            $url2 = $sLink2 === 'otro' ?  $url2 = $link2 : $url2 = $sLink2;

            $tUrl1 = $sLink1 === 'otro' ? 2 : 1;
            $tUrl2 = $sLink2 === 'otro' ? 2 : 1;

            $img1 = $_FILES['img1']['tmp_name'];
            $img2 = $_FILES['img2']['tmp_name'];


            $img1Name = $_FILES['img1']['name'];
            $img2Name = $_FILES['img2']['name'];

            $timg1 = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));
            $timg2 = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));

            $dir = "public/img/sliders/";
            $fecha = date('Ymd_His');
            $r1 = $dir . "IMG" . $fecha . $img1Name;
            $r2 = $dir . "IMG" . $fecha . $img2Name;

            if ($this->model->insert([
                'img1' => $r1,
                'tit1' => $tit1,
                'desc1' => $desc1,
                'link1' => $url1,
                'img2' => $r2,
                'tit2' => $tit2,
                'desc2' => $desc2,
                'link2' => $url2,
                'id_usu' => $id_usu,
                'tUrl1' => $tUrl1,
                'tUrl2' => $tUrl2,
            ])) {
                if (move_uploaded_file($img1, $r1) && move_uploaded_file($img2, $r2)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'sliders'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al subir las imagenes',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Error al guardar los datos',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getImgs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getImg($id_usu);
            echo json_encode($tabla);
        }
    }


    function upImgs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tit1 = $_POST['tit1'];
            $desc1 = $_POST['desc1'];

            $tit2 = $_POST['tit2'];
            $desc2 = $_POST['desc2'];

            $id_usu = $_POST['id_usu'];
            $id_slider = $_POST['id_slider'];

            $link1 = $_POST['link1'];
            $link2 = $_POST['link2'];
            $sLink1 = $_POST['sLink1'];
            $sLink2 = $_POST['sLink2'];

            $img1Bd = $_POST['img1Bd'];
            $img2Bd = $_POST['img2Bd'];

            $img1 = $_FILES['img1']['tmp_name'];
            $img2 = $_FILES['img2']['tmp_name'];


            $img1Name = $_FILES['img1']['name'];
            $img2Name = $_FILES['img2']['name'];

            $url1 = $sLink1 === 'otro' ? $url1 = $link1 : $url1 = $sLink1;
            $url2 = $sLink2 === 'otro' ?  $url2 = $link2 : $url2 = $sLink2;

            $tUrl1 = $sLink1 === 'otro' ? 2 : 1;
            $tUrl2 = $sLink2 === 'otro' ? 2 : 1;

            $timg1 = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));
            $timg2 = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));

            $dir = "public/img/sliders/";
            $fecha = date('Ymd_His');
            $r1 = $dir . "IMG" . $fecha . $img1Name;
            $r2 = $dir . "IMG" . $fecha . $img2Name;

            $file1 = is_file($img1) == true ? true : false;
            $file2 = is_file($img2) == true ? true : false;

            if ($file1 && !$file2) {
                if ($this->model->update([
                    'id_slider' => $id_slider,
                    'img1' => $r1,
                    'tit1' => $tit1,
                    'desc1' => $desc1,
                    'link1' => $url1,
                    'img2' => $img2Bd,
                    'tit2' => $tit2,
                    'desc2' => $desc2,
                    'link2' => $url2,
                    'id_usu' => $id_usu,
                    'tUrl1' => $tUrl1,
                    'tUrl2' => $tUrl2
                ])) {
                    if (move_uploaded_file($img1, $r1)) {
                        unlink($img1Bd);
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'sliders'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al guardar la imagen',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al guardar los datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else if (!$file1 && $file2) {
                if ($this->model->update([
                    'id_slider' => $id_slider,
                    'img1' => $img1Bd,
                    'tit1' => $tit1,
                    'desc1' => $desc1,
                    'link1' => $url1,
                    'img2' => $r2,
                    'tit2' => $tit2,
                    'desc2' => $desc2,
                    'link2' => $url2,
                    'id_usu' => $id_usu,
                    'tUrl1' => $tUrl1,
                    'tUrl2' => $tUrl2
                ])) {
                    if (move_uploaded_file($img2, $r2)) {
                        unlink($img2Bd);
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'sliders'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al guardar la imagen',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al guardar los datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else if ($file1 && $file2) {
                if ($this->model->update([
                    'id_slider' => $id_slider,
                    'img1' => $r1,
                    'tit1' => $tit1,
                    'desc1' => $desc1,
                    'link1' => $url1,
                    'img2' => $r2,
                    'tit2' => $tit2,
                    'desc2' => $desc2,
                    'link2' => $url2,
                    'id_usu' => $id_usu,
                    'tUrl1' => $tUrl1,
                    'tUrl2' => $tUrl2
                ])) {
                    if (
                        move_uploaded_file($img1, $r1)
                        && move_uploaded_file($img2, $r2)
                    ) {
                        unlink($img1Bd);
                        unlink($img2Bd);
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'sliders'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al guardar la imagen',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al guardar los datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Error no se pued realizar ninguna acción',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
