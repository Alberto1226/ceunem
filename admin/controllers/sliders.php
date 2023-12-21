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
            $r1 = $dir . "IMG1_" . $fecha . "_" . $img1Name;
            $r2 = $dir . "IMG2_" . $fecha . "_" . $img2Name;

            $slider1 = [
                'img' => $r1,
                'tit' => $tit1,
                'descripcion' => $desc1,
                'link' => $url1,
                'tUrl' => $tUrl1,
                'id_usu' => $id_usu
            ];

            $slider2 = [
                'img' => $r2,
                'tit' => $tit2,
                'descripcion' => $desc2,
                'link' => $url2,
                'tUrl' => $tUrl2,
                'id_usu' => $id_usu
            ];

            if (
                $timg1 == "jpg" or $timg1 == "jpeg" or $timg1 == "png" &&
                $timg2 == "jpg" or $timg2 == "jpeg" or $timg2 == "png"
            ) {
                if ($this->model->insert($slider1) && $this->model->insert($slider2)) {
                    if (move_uploaded_file($img1, $r1) && move_uploaded_file($img2, $r2)) {
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
            $id_usu = $_POST['id_usu1'];

            $id_slider1 = $_POST['id_slider1'];
            $tit1 = $_POST['tit1'];
            $descripcion1 = $_POST['descripcion1'];
            $link1 = $_POST['link1'];
            $sLink1 = $_POST['sLink1'];
            $img1Bd = $_POST['img1Bd'];
            $img1 = $_FILES['img1']['tmp_name'];
            $img1Name = $_FILES['img1']['name'];
            $url1 = $sLink1 === 'otro' ? $url1 = $link1 : $url1 = $sLink1;
            $tUrl1 = $sLink1 === 'otro' ? 2 : 1;
            $timg1 = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));

            $id_slider2 = $_POST['id_slider2'];
            $tit2 = $_POST['tit2'];
            $descripcion2 = $_POST['descripcion2'];
            $link2 = $_POST['link2'];
            $sLink2 = $_POST['sLink2'];
            $img2Bd = $_POST['img2Bd'];
            $img2 = $_FILES['img2']['tmp_name'];
            $img2Name = $_FILES['img2']['name'];
            $url2 = $sLink2 === 'otro' ?  $url2 = $link2 : $url2 = $sLink2;
            $tUrl2 = $sLink2 === 'otro' ? 2 : 1;
            $timg2 = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));

            $dir = "public/img/sliders/";
            $fecha = date('Ymd_His');
            $r1 = $dir . "IMG1_" . $fecha . "_" . $img1Name;
            $r2 = $dir . "IMG2_" . $fecha . "_" . $img2Name;

            $file1 = is_file($img1) == true ? true : false;
            $file2 = is_file($img2) == true ? true : false;

            //sin imagen
            $slider1 =[
                'id_slider' => $id_slider1,
                'img' => $img1Bd,
                'tit' => $tit1,
                'descripcion' => $descripcion1,
                'link' => $url1,
                'tUrl' => $tUrl1,
                'id_usu' => $id_usu
            ];

            $slider2 =[
                'id_slider' => $id_slider2,
                'img' => $img2Bd,
                'tit' => $tit2,
                'descripcion' => $descripcion2,
                'link' => $url2,
                'tUrl' => $tUrl2,
                'id_usu' => $id_usu
            ];

            //con imagen
            $slider1Img = [
                'id_slider' => $id_slider1,
                'img' => $r1,
                'tit' => $tit1,
                'descripcion' => $descripcion1,
                'link' => $url1,
                'tUrl' => $tUrl1,
                'id_usu' => $id_usu
            ];

            $slider2Img = [
                'id_slider' => $id_slider2,
                'img' => $r2,
                'tit' => $tit2,
                'descripcion' => $descripcion2,
                'link' => $url2,
                'tUrl' => $tUrl2,
                'id_usu' => $id_usu
            ];

            if($file1 and $file2){
                if($timg1 == "jpg" or $timg1 == "jpeg" or $timg1 == "png" &&
                $timg2 == "jpg" or $timg2 == "jpeg" or $timg2 == "png"){
                    if($this->model->update($slider1Img) && $this->model->update($slider2Img)){
                        if(move_uploaded_file($img1, $r1) && move_uploaded_file($img2, $r2)){
                            unlink($img1Bd);
                            unlink($img2Bd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'sliders'
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }else{
                            $arrResponse = array(
                                'status' => false, 'msg' => 'Error al guardar datos',
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    }else{
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al modificar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                }else{
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Formatos no aceptados',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else if(!$file1 and $file2){
                if($timg2 == "jpg" or $timg2 == "jpeg" or $timg2 == "png"){
                    if($this->model->update($slider1) && $this->model->update($slider2Img)){
                        if(move_uploaded_file($img2, $r2)){
                            unlink($img2Bd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'sliders'
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }else{
                            $arrResponse = array(
                                'status' => false, 'msg' => 'Error al guardar datos',
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    }else{
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al modificar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                }else{
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Formatos no aceptados',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else if($file1 and !$file2){
                if($timg1 == "jpg" or $timg1 == "jpeg" or $timg1 == "png"){
                    if($this->model->update($slider1Img) && $this->model->update($slider2)){
                        if(move_uploaded_file($img1, $r1)){
                            unlink($img1Bd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'sliders'
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }else{
                            $arrResponse = array(
                                'status' => false, 'msg' => 'Error al guardar datos',
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    }else{
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al modificar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                }else{
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Formatos no aceptados',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->update($slider1) && $this->model->update($slider2)){
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'sliders'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }else{
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al modificar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
}
